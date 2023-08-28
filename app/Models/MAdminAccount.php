<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MAdminAccount extends Model
{
    use HasFactory;
    protected $table = 'admin_account';
    protected $fillable = [

        'email',
        'password',
    ];
}
