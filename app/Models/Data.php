<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'karyawan_id',
        'foto',
        'tanggal_masuk',
        'keterangan',

    ];
    
    protected $hidden = [
                'created_at',
        'updated_at',
    ];

    public function karyawan()
{
    return $this->belongsTo(Karyawan::class, 'karyawan_id');
}

}


