<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Menampilkan semua posisi magang.
     */
    public function index()
    {
        $positions = Position::latest()->get();

        return view('admin.positions.index', compact('positions'));
    }

    /**
     * Menampilkan form tambah posisi.
     */
    public function create()
    {
        return view('admin.positions.create');
    }

    /**
     * Menyimpan posisi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'quota' => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
        ]);

        Position::create($validated);

        return redirect()
            ->route('admin.positions.index')
            ->with('success', 'Posisi magang berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail posisi.
     */
    public function show(Position $position)
    {
        return view('admin.positions.show', compact('position'));
    }

    /**
     * Menampilkan form edit.
     */
    public function edit(Position $position)
    {
        return view('admin.positions.edit', compact('position'));
    }

    /**
     * Mengupdate posisi.
     */
    public function update(Request $request, Position $position)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'department' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'quota' => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
        ]);

        $position->update($validated);

        return redirect()
            ->route('admin.positions.index')
            ->with('success', 'Posisi magang berhasil diperbarui.');
    }

    /**
     * Menghapus posisi.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()
            ->route('admin.positions.index')
            ->with('success', 'Posisi magang berhasil dihapus.');
    }
}
