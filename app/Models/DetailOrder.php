<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailOrder extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $primaryKey = 'no_order';
    protected $keyType = 'string';


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'no_order', 'no_order');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    

}
