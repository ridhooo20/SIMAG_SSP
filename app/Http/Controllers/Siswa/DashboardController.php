<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard siswa
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Posisi Magang yang tersedia
        |--------------------------------------------------------------------------
        */

        $positions = Position::where('is_active', true)
            ->where('quota', '>', 0)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Pengajuan milik siswa yang sedang login
        |--------------------------------------------------------------------------
        */

        $applications = Application::with('position')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Kirim data ke dashboard
        |--------------------------------------------------------------------------
        */

        return view('siswa.dashboard', [
            'positions' => $positions,
            'applications' => $applications,
        ]);
    }


    /**
     * Detail posisi magang
     */
    public function showPosition(Position $position)
    {
        return view(
            'siswa.positions.show',
            compact('position')
        );
    }
}