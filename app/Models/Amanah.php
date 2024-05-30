<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Amanah extends Model
{

    protected $guarded = [];

    use HasFactory;

    public function anggota(): HasMany
    {
        return $this->hasMany(Anggota::class);
    }
}
