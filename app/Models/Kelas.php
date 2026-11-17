<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
     use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['kelas','jurusan_id','jenjang_id'];
    public function kelas()
    {
        return $this->hasMany(Kelas::class,'kelas_id');
    }
}
    