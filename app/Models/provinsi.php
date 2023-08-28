<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    protected $table = 'provinsi'; // Nama tabel provinsi

    protected $fillable = ['nama']; // Kolom yang bisa diisi

    // public function kota()
    // {
    //     return $this->hasMany(Kota::class, 'id_provinsi', 'id');
    // }
}
