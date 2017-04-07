<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Models\User;
use Excel,Input,File;
use DB;

class DatabaseController extends Controller{
  // $use = new User();
  // $use = User::all();
  // // echo $use;
  public function updateDB(Request $request) {
    $user = new User();
    $user = User::all();
    echo $user->contains('mssv',13020570)."</br>";
      Excel::load($request->fileExcels, function($reader){
          $reader->each(function($sheet){
              $sheet->each(function($row){
                  echo "$row->ma_so_sv"."</br>";
                  
                  // if ($user->contains('mssv',$row->ma_so_sv)) {
                  //   $user = new User();
                  //   $user->username=$row->ho_ten;
                  //   $user->password=$row->ho_ten;
                  //   $user->mssv=$row->mssv;
                  //   $user->save();
                  // }else{
                  //   echo "fail add:"
                  //   echo $row->ma_so_sv."</br>"."</br>";
                  // }
              });
          });
      });
  }
}
