<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nama_siswa', 'nis', 'jurusan', 'kelas_id', 'email'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
