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
}
