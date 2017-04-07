<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\User;
use Excel,Input,File;
use DB;

class DatabaseController extends Controller
{
  public function updateDB(Request $request) {
      Excel::load($request->fileExcels, function($reader){
          $reader->each(function($sheet){
              $sheet->each(function($row){
                  echo $row->ma_so_sv."</br>"."</br>";
              });

          });
      });
  }
}
