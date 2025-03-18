<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends Model
{
    use HasFactory,SoftDeletes;

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role');
    }

}
