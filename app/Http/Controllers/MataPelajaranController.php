<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajaran = MataPelajaran::all(); // Mengambil semua data mata pelajaran
        return view('pelajaran.index', compact('mataPelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $mataPelajaran = MataPelajaran::create($validated);

        return response()->json([
            'success' => 'Mata Pelajaran berhasil ditambahkan!',
            'mataPelajaran' => $mataPelajaran,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mataPelajaran = MataPelajaran::findOrFail($id);
        $mataPelajaran->delete();

        return response()->json(['success' => 'Mata Pelajaran berhasil dihapus!']);
    }
}
