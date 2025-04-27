<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang bisa diisi secara mass-assignment
    protected $fillable = [
        'name',
        'email',
        'phone', // Kolom phone
        'password',
        'role',  // Kolom role
        'status',
    ];

    // Properti tambahan jika diperlukan, seperti hidden attributes
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika Anda memerlukan casting data
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
