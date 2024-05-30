<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $primaryKey = 'no_pembayaran';

    protected $keyType = 'string';

    protected $guarded = [];

    use HasFactory;

    // Relasi order
    public function order() : BelongsTo
    {
        return $this->belongsTo(Order::class, 'no_order', 'no_order');
    }

    // Relasi payment method
    public function paymentMethod() : BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class, 'kode_pembayaran', 'kode');
    }

}
