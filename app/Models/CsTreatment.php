<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsTreatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'process',
        'parameter',
        'standard',
        'tools',
        'inspection_result_1',
        'inspection_result_2',
        'judgement',
        'action',
    ];
}
