<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function index(Request $request)
    {
        $query = User::whereIn('role', ['mahasiswa', 'siswa'])
            ->whereHas('applications')
            ->with(['applications.position'])
            ->withCount('applications');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhereHas('applications', function ($aq) use ($search) {
                        $aq->where('registration_number', 'like', "%{$search}%")
                            ->orWhere('institution', 'like', "%{$search}%")
                            ->orWhere('study_program', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $status = $request->status;

            $query->whereHas('applications', function ($q) use ($status) {
                $q->where('status', $status);
            });
        }

        $participants = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.participants.index', compact('participants'));
    }

    public function show(User $user)
    {
        abort_unless(
            in_array($user->role, ['mahasiswa', 'siswa'], true),
            404
        );

        $user->load([
            'applications' => function ($query) {
                $query->with('position')->latest();
            },
        ]);

        abort_if($user->applications->isEmpty(), 404);

        return view('admin.participants.show', compact('user'));
    }
}
