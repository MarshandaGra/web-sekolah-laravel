<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailPelanggaran extends Model
{
    use HasFactory;
    protected $table = 'detail_pelanggaran';

    protected $fillable = [
        'nama_pelanggaran',
        'poin'
    ];

    public function pelanggarans()
    {
        return $this->hasMany(Pelanggaran::class, 'detail_pelanggaran_id');
    }
}
