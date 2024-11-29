<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all(); // Mengambil semua data guru
        return view('guru.index', compact('guru'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:gurus,nip',
            'email' => 'required|email|unique:gurus,email',
            'no_hp' => 'required|string|max:15',
            'alamat' => 'nullable|string|max:255',
        ]);

        $guru = Guru::create($validated);

        return response()->json([
            'success' => 'Guru berhasil ditambahkan!',
            'guru' => $guru,
        ]);
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->json($guru);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:gurus,nip,' . $id,
            'email' => 'required|email|unique:gurus,email,' . $id,
            'no_hp' => 'required|string|max:15',
            'alamat' => 'nullable|string|max:255',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update($validated);

        return response()->json([
            'success' => 'Guru berhasil diperbarui!',
            'guru' => $guru,
        ]);
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return response()->json(['success' => 'Guru berhasil dihapus!']);
    }

}
