<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class User extends  Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $fillable = ['username','email','password'];
    public function role(){
        return $this->hasOne();
    }
}
