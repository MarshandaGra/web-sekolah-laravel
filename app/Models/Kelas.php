<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'guru_id'
    ];

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'kelas_id');
    }

    public function pelanggarans()
    {
        return $this->hasMany(Pelanggaran::class, 'kelas_id');
    }

    public function pelajarans()
    {
        return $this->hasMany(Pelajaran::class, 'kelas_id');
    }
    
    public function guru()
    {
        return $this->belongsTo(Guru::class,'guru_id');
    }
}
