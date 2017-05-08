<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Models\User;
use App\Models\Sinh_Vien;
use Excel,Input,File;
use Hash;
use DB;
class DatabaseController extends Controller{
    public function readExcels(Request $request){
      $user     = $request->session()->get('user');
      $sinhvien = $request->session()->get('sinhvien');
      return view('admin.readExcels')->with([
            'user'=>$user,
            'sinhvien' => $sinhvien
            ]);
    }
    public function updateDB(Request $request) {
    switch ($request->choseTable) {
      case 'students':
        $this->readExcelsStudents($request);
        break;
      case 'class':
        # code...
        break;
      default:
        # code...
        break;
    }
  }

  public function readExcelsClass($request){
    echo $request->choseTable;
  }

  public function readExcelsStudents($request){
      $S1=Sinh_Vien::all()->count();
      Excel::selectSheets('Sheet1')->load($request->fileExcels, function($reader){
        $reader->each(function($row){
            if (Sinh_Vien::find($row->mssv) != null ) {
              echo "</br>"."Haved: ".$row->name;
            }else {
              $sinh_vien_new = new Sinh_Vien();
              $user = new User();

              $sinh_vien_new->mssv = $row->mssv;
              $sinh_vien_new->fullname = $row->name;
              $sinh_vien_new->birthday = $row->birthday;
              $sinh_vien_new->class = $row->class;

              $user->username = $row->mssv;
              $user->email = "$row->mssv"."@vnu.edu.vn";
              $user->password = Hash::make($row->mssv);
              $user->mssv = $row->mssv;
              $user->id_role =3;
              $user->avatar = $row->mssv;

              $user->save();
              $sinh_vien_new->save();
            }
        });
      });
      $S2=Sinh_Vien::all()->count();
      echo "</br>"."Before: ".$S1;
      echo "</br>"."Later: ".$S2;
      echo "</br>"."Đã thêm ".($S2-$S1)." Sinh Viên";
      return view('admin.readExcels');
  }

  public function readExcelsPresidentClass(Request $request){
    
  }

  public function readExcelsPresidentGroup(Request $request){
    
  }

  public function readExcelsAdviser(Request $request){
    
  }

  public function readExcelsViolateYTSV(Request $request){
    
  }

  public function readExcelsViolateYTCD(Request $request){
    
  }

  public function readExcelsBonus(Request $request){
    
  }
}