<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    // relasi tabel cart
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // relasi tabel detail_order
    public function detail_orders(): HasMany
    {
        return $this->hasMany(DetailOrder::class);
    }

}
