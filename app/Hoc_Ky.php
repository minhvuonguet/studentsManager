<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hoc_Ky extends Model
{
  protected $table = 'hocky';
  protected $fillable = ['id','point_id', 'ma_hk', 'mssv', 'diem_ren_luyen'];

  public function Hocky(){
      return $this->hasOne();
  }
}
