<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perusahaan extends Model
{
    use HasFactory;
    protected $fillable=[
        'siswa_id',
        'nama',
        'about',
        'keunggulan' ,
        'lokasi',
        'jurusan',
        'alamat',
        'photo'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
