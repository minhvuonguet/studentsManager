<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends  Model
{
    protected $table = 'users';
    
    protected $fillable = ['name','email','password', 'image'];

    public function role(){
        return $this->hasOne();
    }

}