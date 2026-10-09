<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Menampilkan semua pengajuan magang.
     */
    public function index()
    {
        $applications = Application::with(['user', 'position'])
            ->latest()
            ->get();

        return view('admin.applications.index', compact('applications'));
    }

    /**
     * Menampilkan detail pengajuan.
     */
    public function show(Application $application)
    {
        $application->load(['user', 'position']);

        return view('admin.applications.show', compact('application'));
    }

    /**
     * Menyetujui pengajuan.
     */
    public function approve(Request $request, Application $application)
{
    $request->validate([
        'notes' => ['nullable', 'string', 'max:2000'],
    ]);

    $application->update([
        'status' => 'approved',
        'notes' => $request->filled('notes')
            ? $request->notes
            : null,
    ]);

    return back()->with(
        'success',
        'Pengajuan berhasil disetujui.'
    );
}

    /**
     * Menolak pengajuan.
     */
    public function reject(Request $request, Application $application)
{
    $request->validate([
        'notes' => ['nullable', 'string', 'max:2000'],
    ]);

    $application->update([
        'status' => 'rejected',
        'notes' => $request->filled('notes')
            ? $request->notes
            : null,
    ]);

    return back()->with(
        'success',
        'Pengajuan berhasil ditolak.'
    );
}

    public function pending(Application $application)
{
    $application->update([
        'status' => 'pending',
        'notes' => null,
    ]);

    return back()->with(
        'success',
        'Status pengajuan dikembalikan menjadi pending.'
    );
}
}