<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['user', 'position'])
            ->latest()
            ->get();

        return view('admin.applications.index', compact('applications'));
    }

    public function show(Application $application)
    {
        $application->load(['user', 'position']);

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Menerima peserta dan mengurangi kuota.
     */
    public function approve(Request $request, Application $application)
    {
        $validated = $request->validate([
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        DB::transaction(function () use ($application, $validated) {
            $app = Application::whereKey($application->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Jangan mengurangi kuota dua kali.
            if ($app->status === 'approved') {
                $app->update([
                    'notes' => $validated['notes'] ?? null,
                ]);

                return;
            }

            $position = Position::whereKey($app->position_id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($position->quota <= 0) {
                throw ValidationException::withMessages([
                    'quota' => 'Kuota magang sudah habis.',
                ]);
            }

            $position->decrement('quota', 1);

            $app->update([
                'status' => 'approved',
                'notes' => $validated['notes'] ?? null,
            ]);
        });

        return back()->with(
            'success',
            'Peserta berhasil diterima. Kuota berkurang 1.'
        );
    }

    /**
     * Menolak peserta.
     */
    public function reject(Request $request, Application $application)
    {
        $validated = $request->validate([
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        DB::transaction(function () use ($application, $validated) {
            $app = Application::whereKey($application->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Jika sebelumnya diterima, kembalikan kuota.
            if ($app->status === 'approved') {
                Position::whereKey($app->position_id)
                    ->lockForUpdate()
                    ->firstOrFail()
                    ->increment('quota', 1);
            }

            $app->update([
                'status' => 'rejected',
                'notes' => $validated['notes'] ?? null,
            ]);
        });

        return back()->with(
            'success',
            'Pengajuan berhasil ditolak.'
        );
    }

    /**
     * Mengembalikan peserta ke status pending.
     */
    public function pending(Application $application)
    {
        DB::transaction(function () use ($application) {
            $app = Application::whereKey($application->id)
                ->lockForUpdate()
                ->firstOrFail();

            // Kembalikan kuota hanya jika status sebelumnya approved.
            if ($app->status === 'approved') {
                Position::whereKey($app->position_id)
                    ->lockForUpdate()
                    ->firstOrFail()
                    ->increment('quota', 1);
            }

            $app->update([
                'status' => 'pending',
                'notes' => null,
            ]);
        });

        return back()->with(
            'success',
            'Status dikembalikan menjadi pending.'
        );
    }
}
