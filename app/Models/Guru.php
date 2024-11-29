<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'no_hp',
        'alamat',
    ];

    public function mataPelajaran()
    {
        return $this->belongsToMany(MataPelajaran::class, 'guru_kelas_mapels')
            ->withPivot('kelas_id')
            ->withTimestamps();
    }

    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }
    public function kelasMapels()
    {
        return $this->hasMany(GuruKelasMapel::class, 'guru_id');
    }
}
