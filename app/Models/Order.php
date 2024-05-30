<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    protected $primaryKey = 'no_order';

    protected $keyType = 'string';

    protected $guarded = [];
    use HasFactory;

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function detail_orders(): HasMany
    {
        return $this->hasMany(DetailOrder::class, 'no_order', 'no_order')->orderBy('no_order');
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class, 'no_order', 'no_order');
    }
}
