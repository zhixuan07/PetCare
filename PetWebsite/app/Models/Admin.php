<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens,HasFactory, Notifiable;

    // Define the table associated with the model
    protected $table = 'admin';

    // Other model properties and methods, if needed
    protected $hidden = [
        'password',
        'remember_token',
    ];
}

