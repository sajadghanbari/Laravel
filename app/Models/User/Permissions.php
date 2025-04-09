<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permissions extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name' , 'description','status'];
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
