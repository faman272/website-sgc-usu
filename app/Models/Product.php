<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'harga',
        'harga_diskon',
        'deskripsi',
        'gambar',
        'stok',
    ];

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

}
