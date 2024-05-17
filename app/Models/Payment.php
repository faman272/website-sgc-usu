<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $primaryKey = 'no_pembayaran';

    protected $keyType = 'string';

    protected $guarded = [];

    use HasFactory;

    // Relasi order
    public function order()
    {
        return $this->belongsTo(Order::class, 'no_order', 'no_order');
    }

    // Relasi payment method
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'kode_pembayaran', 'kode');
    }

}
