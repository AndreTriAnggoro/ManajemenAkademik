<?php

namespace App\Http\Controllers;

use App\Models\GuruKelasMapel;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class GuruKelasMapelController extends Controller
{
    public function index()
    {
        $guruKelasMapels = GuruKelasMapel::with(['guru', 'kelas', 'mataPelajaran'])->get();
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $mataPelajarans = MataPelajaran::all();

        return view('guru_kelas_mapel.index', compact('guruKelasMapels', 'gurus', 'kelas', 'mataPelajarans'));
    }

    public function store(Request $request)
    {
        GuruKelasMapel::create($request->all());
        return redirect()->route('guru_kelas_mapel.index');
    }

    public function edit($id)
    {
        $guruKelasMapel = GuruKelasMapel::find($id);
        $gurus = Guru::all();
        $kelas = Kelas::all();
        $mataPelajarans = MataPelajaran::all();

        return view('guru_kelas_mapel.edit', compact('guruKelasMapel', 'gurus', 'kelas', 'mataPelajarans'));
    }

    public function update(Request $request, $id)
    {
        $guruKelasMapel = GuruKelasMapel::findOrFail($id);

        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
        ]);

        $guruKelasMapel->update([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
        ]);

        return redirect()->route('guru_kelas_mapel.index')->with('success', 'Data updated successfully!');
    }


    public function destroy($id)
    {
        $guruKelasMapel = GuruKelasMapel::findOrFail($id);
        $guruKelasMapel->delete();

        return redirect()->route('guru_kelas_mapel.index')->with('success', 'Data deleted successfully!');
    }
}
