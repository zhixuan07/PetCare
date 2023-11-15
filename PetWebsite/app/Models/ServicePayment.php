<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePayment extends Model
{
    use HasFactory;
    public function service_payment()
    {
        return $this ->belongsTo(Order::class,'service_payments_id');
    }
    protected $fillable =['service_id','amount'];
}
