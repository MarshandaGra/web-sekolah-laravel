<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $table = 'pelanggaran';

    protected $fillable = [
        'nama_siswa',
        'kelas_id',
        'detail_pelanggaran_id'
    ];

    public function siswa()
    {
        return $this->belongsTo(Absensi::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function detailPelanggaran()
    {
        return $this->belongsTo(DetailPelanggaran::class, 'detail_pelanggaran_id');
    }
}
