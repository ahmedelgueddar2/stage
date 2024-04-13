<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function users(){
        return $this->belongsToMany(User::class,'role_user');
    }
    public function permissions(){
        return $this->belonsToMany(Permissions::class,'role_permissions');
    }

    public function hasPermission($permission){
        return $this->permissions->contains('name',$permission);

    }
}
