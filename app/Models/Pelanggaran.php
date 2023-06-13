<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'keterangan_pelanggaran',
        'point',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
