<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata1145 extends Model
{
     use HasFactory;

    protected $table = 'biodata_1145';
    protected $fillable = [
        'nama_lengkap',
        'profesi',
        'alamat',
        'no_hp',
        'email',
        'foto_profil'
    ];
}
