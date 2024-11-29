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

    public function dashboard()
    {
        $kelas = Kelas::all(); // Mendapatkan semua kelas
        return view('index', compact('kelas'));
    }

    public function filter(Request $request)
    {
        $kelasId = $request->input('kelas_id');
        $guruId = $request->input('guru_id');

        // Filter data
        $siswaList = Siswa::where('kelas_id', $kelasId)->get();
        $guruList = Guru::whereHas('kelasMapels', function ($query) use ($kelasId) {
            $query->where('kelas_id', $kelasId);
        })->get();

        $siswaKelasGuru = GuruKelasMapel::with('guru', 'kelas', 'mataPelajaran')
            ->where('kelas_id', $kelasId)
            ->when($guruId, function ($query) use ($guruId) {
                $query->where('guru_id', $guruId);
            })->get();

        $kelas = Kelas::all();

        return view('index', compact('kelas', 'siswaList', 'guruList', 'siswaKelasGuru', 'kelasId', 'guruId'));
    }
}