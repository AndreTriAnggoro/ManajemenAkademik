<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        $kelas = Kelas::all();
        return view('siswa.index', compact('siswas', 'kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:siswas',
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        // Menyimpan data siswa baru
        $siswa = Siswa::create($validated);
        $siswa->load('kelas');

        // Mengembalikan response dengan data siswa yang baru
        return response()->json([
            'success' => 'Siswa berhasil ditambahkan!',
            'siswa' => $siswa
        ]);
    }


    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|numeric|unique:siswas,nisn,' . $id,
            'kelas_id' => 'required|exists:kelas,id',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'alamat' => 'required|string|max:255',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($validated); // Perbarui data siswa
        $siswa->load('kelas');

        return response()->json([
            'success' => 'Data siswa berhasil diperbarui!',
            'siswa' => $siswa,
        ]);
    }

    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return response()->json(['success' => 'Data siswa berhasil dihapus']);
    }

}
