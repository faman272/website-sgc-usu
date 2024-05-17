<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function payment()
    {
        return $this->hasMany(Payment::class, 'kode_pembayaran', 'kode');
    }
}
