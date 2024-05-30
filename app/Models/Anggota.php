<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    protected $guarded = [];

    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    use HasFactory;


    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class);
    }

    public function amanah(): BelongsTo
    {
        return $this->belongsTo(Amanah::class);
    }
}
