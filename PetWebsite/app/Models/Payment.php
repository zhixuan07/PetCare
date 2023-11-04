<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function payment()
    {
        return $this ->belongsTo(Order::class,'payment_id');
    }
    protected $fillable =['order_id','amount'];
}
