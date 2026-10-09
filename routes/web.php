<?php

use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\ParticipantController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Models\Position;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $positions = Position::where('is_active', true)
        ->where('quota', '>', 0)
        ->latest()
        ->get();

    return view('home', compact('positions'));

});

Route::get('/tracking', [ApplicationController::class, 'track'])
    ->name('tracking');

/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    return match (auth()->user()->role) {

        'admin' => redirect()->route('admin.dashboard'),

        'mahasiswa' => redirect()->route('mahasiswa.dashboard'),

        'siswa' => redirect()->route('siswa.dashboard'),

        default => abort(403),

    };

})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| PROFILE
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit',
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update',
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy',
    ])->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| ADMIN SSP
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Admin
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', function () {

            return view('admin.dashboard');

        })->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA MAGANG
        |--------------------------------------------------------------------------
        */

        Route::get('/participants', [
            ParticipantController::class,
            'index',
        ])->name('participants.index');

        Route::get('/participants/{user}', [
            ParticipantController::class,
            'show',
        ])->name('participants.show');

        /*
        |--------------------------------------------------------------------------
        | CRUD Posisi Magang
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'positions',
            PositionController::class
        );

        /*
        |--------------------------------------------------------------------------
        | Pengajuan Magang
        |--------------------------------------------------------------------------
        */

        Route::get('/applications', [
            AdminApplicationController::class,
            'index',
        ])->name('applications.index');

        Route::get('/applications/{application}', [
            AdminApplicationController::class,
            'show',
        ])->name('applications.show');

        /*
        |--------------------------------------------------------------------------
        | Approve Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::patch('/applications/{application}/approve', [
            AdminApplicationController::class,
            'approve',
        ])->name('applications.approve');

        /*
        |--------------------------------------------------------------------------
        | Reject Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::patch('/applications/{application}/reject', [
            AdminApplicationController::class,
            'reject',
        ])->name('applications.reject');

        /*
        |--------------------------------------------------------------------------
        | Kembalikan ke Pending
        |--------------------------------------------------------------------------
        */

        Route::patch('/applications/{application}/pending', [
            AdminApplicationController::class,
            'pending',
        ])->name('applications.pending');

    });

/*
|--------------------------------------------------------------------------
| MAHASISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:mahasiswa'])
    ->prefix('mahasiswa')
    ->name('mahasiswa.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Mahasiswa
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            MahasiswaDashboardController::class,
            'index',
        ])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Detail Posisi Magang
        |--------------------------------------------------------------------------
        */

        Route::get('/positions/{position}', [
            MahasiswaDashboardController::class,
            'showPosition',
        ])->name('positions.show');

        /*
        |--------------------------------------------------------------------------
        | Form Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::get('/positions/{position}/apply', [
            ApplicationController::class,
            'create',
        ])->name('applications.create');

        /*
        |--------------------------------------------------------------------------
        | Submit Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::post('/positions/{position}/apply', [
            ApplicationController::class,
            'store',
        ])->name('applications.store');

        /*
        |--------------------------------------------------------------------------
        | Cek Status Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::get('/applications/{application}', [
            ApplicationController::class,
            'show',
        ])->name('applications.show');

    });

/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:siswa'])
    ->prefix('siswa')
    ->name('siswa.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Siswa
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [
            SiswaDashboardController::class,
            'index',
        ])->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Detail Posisi Magang
        |--------------------------------------------------------------------------
        */

        Route::get('/positions/{position}', [
            SiswaDashboardController::class,
            'showPosition',
        ])->name('positions.show');

        /*
        |--------------------------------------------------------------------------
        | Form Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::get('/positions/{position}/apply', [
            ApplicationController::class,
            'create',
        ])->name('applications.create');

        /*
        |--------------------------------------------------------------------------
        | Submit Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::post('/positions/{position}/apply', [
            ApplicationController::class,
            'store',
        ])->name('applications.store');

        /*
        |--------------------------------------------------------------------------
        | Cek Status Pengajuan
        |--------------------------------------------------------------------------
        */

        Route::get('/applications/{application}', [
            ApplicationController::class,
            'show',
        ])->name('applications.show');

    });

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
