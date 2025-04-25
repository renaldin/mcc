<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CsPengecekan extends Model
{
    protected $table = 'cs_pengecekan';

    protected $fillable = [
        'tanggal', 'nama_part', 'air_pocket', 'gumpal', 'bercak', 'tipis', 'meler', 'tunggu_repair', 'total_check'
    ];
}
