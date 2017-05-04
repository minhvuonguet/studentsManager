<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Models\User;
use App\Models\Sinh_Vien;
use Excel,Input,File;
use DB;
class DatabaseController extends Controller{
    public function readExcels(Request $request){
      return view('admin.readExcels')->with([
            'username'=>$request->session()->get('username'),
            'mssv'=>$request->session()->get('mssv'),
            'role_id'=>$request->session()->get('role_id'),
            'avatar'=>$request->session()->get('avatar'),
            ]);
    }
    public function updateDB(Request $request) {
    $sinh_vien= new Sinh_Vien();
      Excel::load($request->fileExcels, function($reader){
          $reader->each(function($sheet){
              $sheet->each(function($row){
                  $sinh_vien = Sinh_Vien::find($row->mssv);
                  if (Sinh_Vien::find($row->mssv) != null ) {
                    echo "</br>"."Sinh vien:".$sinh_vien->fullname." mssv:".$sinh_vien->mssv." đã có trong csdl";
                  }else {
                    // $add=1;
                    $sinh_vien_new = new Sinh_Vien();
                    $sinh_vien_new->mssv = $row->mssv;
                    $sinh_vien_new->fullname = $row->name;
                    $sinh_vien_new->birthday = $row->birthday;
                    $sinh_vien_new->class = $row->class;
                    $sinh_vien_new->save();
                    // $add++;
                    // echo $add;
                  }
              });
          });
      });
    // echo "</br>"."Đã thêm ".$add." vào csdl";
  }
}