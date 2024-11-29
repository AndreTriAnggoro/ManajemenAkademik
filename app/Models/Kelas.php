<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai dengan Laravel convention)
    protected $table = 'kelas';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_kelas',
        'tingkat',
        'deskripsi',
    ];

    public function guruMapel()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas_mapels')
            ->withPivot('mata_pelajaran_id')
            ->withTimestamps();
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }
    public function guruMapels()
    {
        return $this->hasMany(GuruKelasMapel::class, 'kelas_id');
    }

    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas_mapels')
            ->withPivot('mata_pelajaran_id');
    }

    public function mataPelajarans()
    {
        return $this->belongsToMany(MataPelajaran::class, 'guru_kelas_mapels')
            ->withPivot('guru_id');
    }
}
