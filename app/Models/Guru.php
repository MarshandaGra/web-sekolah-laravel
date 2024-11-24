<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = [
        'nip', 
        'nama_guru'
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class,'kelas_id');
    }

    public function pelajaran()
    {
        return $this->hasMany(Pelajaran::class,'pelajaran_id');
    }
}
