<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $guarded = [];
    use HasFactory;

    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $keyType = 'string';


    public function payment()
    {
        return $this->hasMany(Payment::class, 'kode_pembayaran', 'kode');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->kode = 'SGC-' . $model->kode;
        });
    }
}
