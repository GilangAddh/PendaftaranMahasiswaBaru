<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agama extends Model
{
    protected $table = 'agama'; // Nama tabel provinsi

    protected $fillable = ['nama']; // Kolom yang bisa diisi

}
