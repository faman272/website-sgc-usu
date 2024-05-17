<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'no_order';

    protected $keyType = 'string';

    protected $guarded = [];
    use HasFactory;

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function detail_orders()
    {
        return $this->hasMany(DetailOrder::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'no_order', 'no_order');
    }

}
