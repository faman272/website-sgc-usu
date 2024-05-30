<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;


class ModelRoles extends Model
{
    protected $table = 'model_has_roles';

    protected $primaryKey = 'role_id';


    protected $guarded = [];

    // False timestamps
    public $timestamps = false;

    use HasFactory;


    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

}
