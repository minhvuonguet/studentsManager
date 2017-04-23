<?php
/**
 * Created by PhpStorm.
 * User: lv2x
 * Date: 12/03/2017
 * Time: 20:32
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use Excel,Input,File;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use DB;


use App\Models\Form_Diem;
use App\Models\Sinh_Vien;
use App\Models\Points;

class AdminControler extends Controller {
    public function getLogin() {
        return view('admin.login');
    }
    public function postLogin(Request $request){ 
        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>2 ]) ||
            Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>1 ]) ) {
            $use_ = new User();
            echo ("abc");
            return view('admin.adminManager');
        }
        else if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>3 ])) {
            $use_ = new User();
            return redirect()->route('ViewUser');
        } else {
            return redirect()->route('login')->with(
                ['flash_level' => 'danger', 'flash_message' => 'login error, Please check your name or password and try again']
            )->withInput();
        }
//        echo ("asdfasdfsadf");
    }
    public function listUser(){
        return view('admin.adminManager');
    }
    public function ViewUser() {
        return view('Employee.indexStudents');
    }
    public function getLogout() {
        Auth::logout(); // logout user
        return Redirect()->route('login'); //redirect back to login
    }
    public function sendmail (Request $request) {

    }
    public function updatePoint (Request $request, $id, $chu_de) {
        $form_diem = Form_Diem::all();

        $Form = new Form_Diem();
        switch ($chu_de){
            case 'tong_hoc_tap' :
                $Form::updateOrCreate(  [ 'id'=> 1, ], [ 'tong_hoc_tap'=> $id, ] );
                break;
            case 'tru_hoc_luc_yeu' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_hoc_luc_yeu'=> $id, ]  );
                break;
            case 'tru_canh_bao_hoc_vu' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_canh_bao_hoc_vu'=> $id, ] );
                break;
            case 'tru_khong_du_tin_chi' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_du_tin_chi'=> $id, ] );
                break;
            case 'tru_ngien_cuu_kh' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_ngien_cuu_kh'=> $id, ] );
                break;
            case 'tru_khong_thi' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_thi'=> $id, ] );
                break;
            case 'tru_khien_trach_thi' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khien_trach_thi'=> $id, ] );
                break;
            case 'tru_canh_cao_thi' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_canh_cao_thi'=> $id, ] );
                break;
            case 'tru_dinh_chi_thi' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_dinh_chi_thi'=> $id, ] );
                break;
            case 'tong_chap_hanh' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tong_chap_hanh'=> $id, ] );
                break;
            case 'tru_nop_hoc_phi' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_nop_hoc_phi'=> $id, ] );
                break;
            case 'tru_dang_ky_hoc_qua_han' :
                $Form::tru_dang_ky_hoc_qua_han( [ 'id'=> 1, ], [ 'tru_dang_ky_hoc_qua_han'=> $id, ] );
                break;
            case 'tru_khong_di_trieu_tap' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_di_trieu_tap'=> $id, ] );
                break;
            case 'tru_tra_qua_han_ho_so' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_tra_qua_han_ho_so'=> $id, ] );
                break;
            case 'tru_khong_tham_gia_bao_hiem' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_tham_gia_bao_hiem'=> $id, ] );
                break;
            case 'tru_vi_pham_cu_tru' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_vi_pham_cu_tru'=> $id, ] );
                break;
            case 'tru_phe_binh' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_phe_binh'=> $id, ] );
                break;
            case 'tru_khien_trach' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khien_trach'=> $id, ] );
                break;
            case 'tru_canh_cao' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_canh_cao'=> $id, ] );
                break;
            case 'tong_tham_gia' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tong_tham_gia'=> $id, ] );
                break;
            case 'cong_tham_gia_truong' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_tham_gia_truong'=> $id, ] );
                break;
            case 'cong_tham_gia_ngoai' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_tham_gia_ngoai'=> $id, ] );
                break;
            case 'tru_khong_tham_gia' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_tham_gia'=> $id, ] );
                break;
            case 'tong_pham_chat' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tong_pham_chat'=> $id, ] );
                break;
            case 'tru_khong_chap_hanh' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_chap_hanh'=> $id, ] );
                break;
            case 'tru_khong_tinh_than' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tru_khong_tinh_than'=> $id, ] );
                break;
            case 'tong_cong_tac' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'tong_cong_tac'=> $id, ] );
                break;
            case 'cong_giu_chuc_vu' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_giu_chuc_vu'=> $id, ] );
                break;
            case 'cong_hoc_luc' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_hoc_luc'=> $id, ] );
                break;
            case 'cong_tham_gia_thi_chuyen_mon' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_tham_gia_thi_chuyen_mon'=> $id, ] );
                break;
            case 'cong_nckh' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_nckh'=> $id, ] );
                break;
            case 'cong_dat_giai' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_dat_giai'=> $id, ] );
                break;
            case 'cong_ket_nap_dang' :
                $Form::updateOrCreate( [ 'id'=> 1, ], [ 'cong_ket_nap_dang'=> $id, ] );
                break;

        }
        return  [$id, $chu_de];
    }
    public function formdiem () {
        $data = Form_Diem::all();
        echo $data[0]->tong_hoc_tap;
        return View('Employee.mau_diem')->With([
            'tong_hoc_tap' => $data[0]->tong_hoc_tap,
            'tru_hoc_luc_yeu' => $data[0]->tru_hoc_luc_yeu,
            'tru_canh_bao_hoc_vu' => $data[0]->tru_canh_bao_hoc_vu,
            'tru_khong_du_tin_chi' => $data[0]->tru_khong_du_tin_chi,
            'tru_ngien_cuu_kh' => $data[0]->tru_ngien_cuu_kh,
            'tru_khong_thi' => $data[0]->tru_khong_thi,
            
            'tru_khien_trach_thi' => $data[0]->tru_khien_trach_thi,
            'tru_canh_cao_thi' => $data[0]->tru_canh_cao_thi,
            'tru_dinh_chi_thi' => $data[0]->tru_dinh_chi_thi,

            // 2. ý thức và kết quả chấp hành nội quy,quy chế trong nhà trường
            'tong_chap_hanh' => $data[0]->tong_chap_hanh,
            'tru_nop_hoc_phi' => $data[0]->tru_nop_hoc_phi,
            'tru_dang_ky_hoc_qua_han' => $data[0]->tru_dang_ky_hoc_qua_han,
            'tru_khong_di_trieu_tap' => $data[0]->tru_khong_di_trieu_tap,
            'tru_tra_qua_han_ho_so' => $data[0]->tru_tra_qua_han_ho_so,
            'tru_khong_tham_gia_bao_hiem' => $data[0]->tru_khong_tham_gia_bao_hiem,
            'tru_vi_pham_cu_tru' => $data[0]->tru_vi_pham_cu_tru,
           
            'tru_phe_binh' => $data[0]->tru_phe_binh,
            'tru_khien_trach' => $data[0]->tru_khien_trach,
            'tru_canh_cao' => $data[0]->tru_canh_cao,

            // 3. ý thức và kết quả tham gia hoạt động chínht trị xã hội văn hoá, văn nghệ...
            'tong_tham_gia' => $data[0]->tong_tham_gia,
            'cong_tham_gia_truong' => $data[0]->cong_tham_gia_truong,
            'cong_tham_gia_ngoai' => $data[0]->cong_tham_gia_ngoai,
            'tru_khong_tham_gia' => $data[0]->tru_khong_tham_gia,
           
           // 4. phẩm chất công dân và quan hệ cộng đồng
            'tong_pham_chat' => $data[0]->tong_pham_chat,
            'tru_khong_chap_hanh' => $data[0]->tru_khong_chap_hanh,
            'tru_khong_tinh_than' => $data[0]->tru_khong_tinh_than,

            //5.  ý thức và kết quả tham gia công tác phụ trách lớp, đoàn thể...
            'tong_cong_tac' => $data[0]->tong_cong_tac,
            'cong_giu_chuc_vu' => $data[0]->cong_giu_chuc_vu,
            'cong_hoc_luc' => $data[0]->cong_hoc_luc,
            'cong_tham_gia_thi_chuyen_mon' => $data[0]->cong_tham_gia_thi_chuyen_mon,
            'cong_nckh' => $data[0]->cong_nckh,
            'cong_dat_giai' => $data[0]->cong_dat_giai,
            'cong_ket_nap_dang' => $data[0]->cong_ket_nap_dang,
        ]);
    }
    public function newclass(){
        return View('admin.newclass');
    }
    public function postnewclass (Request $request) {
        $classname = $request->clasname;
        echo $classname;
        $sinh_vien= new Sinh_Vien();

        Excel::load($request->fileExcels, function($reader){
            $results = $reader->all();
            foreach ($results as $key=>$value) {
                if($value != null && $value->id != null) {
                    $sinh_vien_new = new Sinh_Vien();
                    $sinh_vien_new->mssv = $value->mssv;
                    $sinh_vien_new->fullname = $value->name;
                    $sinh_vien_new->office = 'Sinh Viên';
                    $sinh_vien_new->birthday = $value->birthday;
                    $sinh_vien_new->class = $value->class;
                    $sinh_vien_new->save();
                }
            }
        });
    }
    public function listclass() {
        $sinhvien = Sinh_Vien::all();
        $diem = Points::all();
        $listClass = [];
        for($i = 0; $i < count($sinhvien); $i++){
            $sinhvien[$i]->point = 0;
            for($j = 0; $j < count($diem)-1 ; $j++) {
                if($diem[$j]->mssv == $sinhvien[$i]->mssv){
                    $sinhvien[$i]->point = $diem[$j]->point_total;
                }
            }
            $listClass[$i] = $sinhvien[$i]->class;
        }
        $listClass = array_unique($listClass);

        return View('admin.listclass')->with([
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }
    public function listofclass ($name) {

    }
}