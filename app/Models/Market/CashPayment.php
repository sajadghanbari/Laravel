<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashPayment extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->morphMany('App\Models\Market\Payment','paymentable');
    }
}
