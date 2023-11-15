<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    protected $fillable =[
        'user_id',
        'Type_service',
        'Date',
        'Time',
        'Type_pet',
        'Number_of_pet'

    ];
}
