<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Position;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function create(Position $position)
    {
        if (! $position->is_active || $position->quota <= 0) {
            abort(404);
        }

        return view('applications.create', compact('position'));
    }

    public function store(Request $request, Position $position)
    {
        if (! $position->is_active || $position->quota <= 0) {
            return back()->with('error', 'Posisi magang sudah tidak tersedia.');
        }

        $validated = $request->validate([
            'phone' => ['required', 'string', 'max:20'],
            'institution' => ['required', 'string', 'max:255'],
            'study_program' => ['required', 'string', 'max:255'],

            'start_date' => ['required', 'date'],

            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],

            'cover_letter' => [
                'required',
                'string',
                'max:5000',
            ],

            'company_document' => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120',
            ],

            'permission_letter' => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120',
            ],

            'portfolio' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120',
            ],
        ]);

        $alreadyApplied = Application::where('user_id', auth()->id())
            ->where('position_id', $position->id)
            ->whereIn('status', ['pending', 'approved'])
            ->exists();

        if ($alreadyApplied) {
            return back()->with(
                'error',
                'Kamu sudah mengajukan posisi ini.'
            );
        }

        $companyDocumentPath = $request
            ->file('company_document')
            ->store(
                'applications/company-documents',
                'public'
            );

        $permissionLetterPath = $request
            ->file('permission_letter')
            ->store(
                'applications/permission-letters',
                'public'
            );

        $portfolioPath = null;

        if ($request->hasFile('portfolio')) {
            $portfolioPath = $request
                ->file('portfolio')
                ->store(
                    'applications/portfolios',
                    'public'
                );
        }

        $validated['user_id'] = auth()->id();
        $validated['position_id'] = $position->id;

        $validated['registration_number'] =
            'MAG-'.
            date('Ymd').
            '-'.
            strtoupper(substr(uniqid(), -6));

        // Default status
        $validated['status'] = 'pending';

        $validated['company_document'] = $companyDocumentPath;
        $validated['permission_letter'] = $permissionLetterPath;
        $validated['portfolio'] = $portfolioPath;

        Application::create($validated);

        return redirect()
            ->route('dashboard')
            ->with(
                'success',
                'Pengajuan magang berhasil dikirim.'
            );
    }

    /**
     * Menampilkan detail/status pengajuan milik user.
     */
    public function show(Application $application)
    {
        // User hanya boleh melihat pengajuannya sendiri
        if ($application->user_id !== auth()->id()) {
            abort(403);
        }

        $application->load('position');

        return view(
            'applications.show',
            compact('application')
        );
    }

    public function track(Request $request)
    {
        $request->validate([
            'registration_number' => [
                'required',
                'string',
                'max:50',
            ],
        ]);

        $application = Application::with(['position', 'user'])
            ->where(
                'registration_number',
                trim($request->registration_number)
            )
            ->first();

        if (! $application) {
            return back()
                ->withInput()
                ->with('tracking_error', 'Nomor pendaftaran tidak ditemukan.');
        }

        return back()
            ->with('tracking_result', [
                'registration_number' => $application->registration_number,
                'status' => $application->status,
                'position' => $application->position?->name,
                'institution' => $application->institution,
                'study_program' => $application->study_program,
                'start_date' => $application->start_date?->format('d F Y'),
                'end_date' => $application->end_date?->format('d F Y'),
                'notes' => $application->notes,
            ]);
    }
}
