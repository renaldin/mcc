<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKalibrasi extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'start', 'end'];

    protected $table = 'jadwal_kalibrasi';
}
