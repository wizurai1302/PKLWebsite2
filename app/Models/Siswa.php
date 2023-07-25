<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable=[
        'Nisn',
        'Nama',
        'JK' ,
        'Kelas',
        'Kota',
        'Keahlian'
    ];

    public function perusahaans()
    {
        return $this->hasMany(Perusahaan::class, 'siswa_id');
    }
}



