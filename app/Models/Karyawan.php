<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'ttl',
        // 'no_rek',
        'alamat',
        'no_telepon',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function izin()
    {
        return $this->hasMany(Izin::class);
    }

    public function pelanggaran()
    {
        return $this->hasMany(Pelanggaran::class);
    }
}

