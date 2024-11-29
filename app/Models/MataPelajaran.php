<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';

    protected $fillable = ['nama', 'deskripsi'];
    public function guruKelas()
    {
        return $this->hasMany(GuruKelasMapel::class, 'mata_pelajaran_id');
    }

    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'guru_kelas_mapels', 'mata_pelajaran_id', 'guru_id');
    }
}
