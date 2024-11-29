<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\GuruKelasMapel;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|integer',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $kelas = Kelas::create($validated);

        return response()->json([
            'success' => 'Kelas berhasil ditambahkan!',
            'kelas' => $kelas,
        ]);
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return response()->json($kelas);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|integer',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($validated);

        return response()->json([
            'success' => 'Kelas berhasil diperbarui!',
            'kelas' => $kelas,
        ]);
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return response()->json(['success' => 'Kelas berhasil dihapus!']);
    }

    public function listKelasDenganSiswa()
    {
        $kelas = Kelas::with('siswas')->get();
        return view('siswabykelas.index', compact('kelas'));
    }

    public function listKelasDenganGuru()
    {
        $kelas = Kelas::with(['gurus' => function ($query) {
            $query->with(['mataPelajarans'])->distinct();
        }])->get();
        return view('gurubykelas.index', compact('kelas'));
    }

    public function listKelasDenganSiswaDanGuru(Request $request)
    {
        $viewType = $request->input('viewType', 'siswa');

        $kelas = Kelas::with(['siswas', 'gurus' => function ($query) {
            $query->with(['mataPelajarans'])->distinct();
        }])->get();

        return view('siswagurubykelas.index', compact('kelas', 'viewType'));
    }
}
