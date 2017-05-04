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
//use Illuminate\Support\Facades\Auth;
use App\User;
use Auth;
use Illuminate\Support\Facades\Mail;
use Excel,Input,File;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use DB;


use App\Models\Form_Diem;
use App\Models\Sinh_Vien;
use App\Models\Points;
use App\Models\Co_Van_Hoc_Tap;
use App\Models\Hoc_Ky;
use App\Models\P_Cong_Tac_SV;
use App\Models\P_Dao_Tao;
use App\Models\P_Doan;
use App\Models\P_Khoa_Hoc_CN;
use App\Models\P_Khoa;


class AdminControler extends Controller {

    public $use_ = null;

    public function getLogin() {
        return view('admin.login');
    }
    
    public function postLogin(Request $request){ 
        $request->session()->forget('username');
        $request->session()->forget('mssv');
        $request->session()->forget('id_role');
        $request->session()->forget('avatar');

        if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>2 ]) ||
            Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>1 ]) ) {
            $this->use_ = new User();
            $request->session()->put('username',Auth::user()->username);
            $request->session()->put('mssv',Auth::user()->mssv);
            $request->session()->put('id_role',Auth::user()->id_role);
            $request->session()->put('avatar',Auth::user()->avatar);
            return view('admin.adminManager');
        }



        else if (Auth::attempt([ 'username' => $request->username, 'password' => $request->password,'id_role'=>3 ])) {
            $this->use_ = new User();
            $request->session()->put('username',Auth::user()->username);
            $request->session()->put('mssv',Auth::user()->mssv);
            $request->session()->put('id_role',Auth::user()->id_role);
            $request->session()->put('avatar',Auth::user()->avatar);
            return redirect()->route('ViewUser');
        }

        else {
            return redirect()->route('login')->with(
                ['flash_level' => 'danger', 'flash_message' => 'login error, Please check your name or password and try again']
            )->withInput();
        }
    }
    public function listUser(){
        return view('admin.adminManager');
    }
    public function ViewUser(Request $request) {

        return view('Employee.indexStudents')->with([
            'username'=>$request->session()->get('username'),
            'mssv'=>$request->session()->get('mssv'),
            'id_role'=>$request->session()->get('id_role'),
            'avatar'=>$request->session()->get('avatar'),
            ]);
    }


    public function getLogout(Request $request) {
        $request->session()->forget('username');
        $request->session()->forget('mssv');
        $request->session()->forget('id_role');
        $request->session()->forget('avatar');
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
        if(Auth::user()->username == 'admin1') {
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
        else {

        }
    }
    public function newclass(){
        return View('admin.newclass');
    }
    public function postnewclass (Request $request) {

        $classname = $request->clasname;
        $sinh_vien= new Sinh_Vien();

        echo $this->use_;
        if($request->type_file == 'list_class'){
            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();


                $Point = new Points();
                $form_diem = Form_Diem::all();
                $hocky = Hoc_Ky::all();
                $point_base = $form_diem[0]->tong_hoc_tap + $form_diem[0]->tong_chap_hanh + $form_diem[0]->tong_pham_chat;
                foreach ($results as $key=>$value) {

                    if( isset($value->mssv)){
                        if($value != null && $value->id != null) {
                            $sinh_vien_new = new Sinh_Vien();
                            $sinh_vien_new->mssv = $value->mssv;
                            $sinh_vien_new->fullname = $value->name;
                            $sinh_vien_new->office = 'Sinh Viên';
                            $sinh_vien_new->birthday = $value->birthday;
                            $sinh_vien_new->class = $value->class;
                            $sinh_vien_new->save();

//                    if($value != null && $value->id != null) {
//                        $sinh_vien_new = new Sinh_Vien();
//                        $sinh_vien_new->mssv = $value->mssv;
//                        $sinh_vien_new->fullname = $value->name;
//                        $sinh_vien_new->office = 'Sinh Viên';
//                        $sinh_vien_new->birthday = $value->birthday;
//                        $sinh_vien_new->class = $value->class;



                        $sinh_vien_new->save();


                            $Point::updateOrCreate(
                                [
                                    'mssv'=>$value->mssv
                                ],
                                [
                                    'id_hoc_ky' => $hocky[0]->id_hoc_ky,
                                    'point_total' => $point_base
                                ]
                            );
                        }
                    }
                    else {
                        break;
                    }

                }
            });
        }
        else if($request->type_file == 'list_ad_class') {

            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
                    $tmp = Sinh_Vien::find($value->mssv);
                    if($tmp ) {

                        $ctsv = new P_Cong_Tac_SV();
                        $form_diem = Form_Diem::all();
                        $diem_cong = $form_diem[0]->cong_giu_chuc_vu;

                        $ctsv::updateOrCreate(
                            [ 'mssv'=> $value->mssv, ],
                            [
                                'point_cong_tac_sv'=> $diem_cong,
                                'mssv'=> $value->mssv,
                                'note' => $value-> office,
                            ]
                        );

                        $sinhvien = new Sinh_Vien();
                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'chuc_vu'=> $value->office, ] );
                    }
                }
            });
        }

        // nghien cuu khoa hoc
        else if($request->type_file == 'list_nghien_cuu_khoa_hoc') {
            echo ($request->type_file );
            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();

                foreach ($results as $key=>$value) {


                    $p_khoa_hoc_cn = new P_Khoa_Hoc_CN();
                    $form_diem = Form_Diem::all();
                    $diem_cong = $form_diem[0]->cong_nckh;
                    //   $Note  = "de tai: " + $value->de_tai + "giai thuong: " + $value->giai_thuong;
                    $p_khoa_hoc_cn::updateOrCreate(
                        [ 'mssv'=> $value->mssv, ],
                        [
                            'point_khoa_hoc_cn'=> $diem_cong,

                            'note' => $value-> note,

                        ]
                    );


                }
            });
        }

        // khen thuong

        else if($request->type_file == 'list_ad_class_khen_thuong') {

            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
                    $tmp = Sinh_Vien::find($value->mssv);
                    if($tmp ) {

                        $ctsv = new P_Cong_Tac_SV();
                        $form_diem = Form_Diem::all();
                        $diem_cong = $form_diem[0]->cong_giu_chuc_vu;

                        $ctsv::updateOrCreate(
                            [ 'mssv'=> $value->mssv, ],
                            [
                                'point_cong_tac_sv'=> $diem_cong,
                                'mssv'=> $value->mssv,
                                'khen_thuong' => $value->khen_thuong,
                            ]
                        );

                        $sinhvien = new Sinh_Vien();
                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'khen_thuong'=> $value->khen_thuong, ] );
                    }
                }
            });
        }





        // bang diem

        else if($request->type_file == 'list_ad_class_bang_diem') {
//        if(Auth::user()->username == 'congtacsinhvien')
            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
//                    $tmp = Sinh_Vien::find($value->mssv);
//                    if($tmp ) {

                        $p_dao_tao = new P_Dao_Tao();
                        $form_diem = Form_Diem::all();
                        $diem_cong = $form_diem[0]->cong_hoc_luc;

                        $p_dao_tao::updateOrCreate(
                            [ 'mssv'=> $value->mssv, ],
                            [
                                'point_dao_tao'=> $diem_cong,
                              //  'mssv'=> $value->mssv,
                                'trung_binh' => $value-> trung_binh,
                                'tich_luy' => $value-> tich_luy,
                                'xep_loai' => $value-> xep_loai,

                            ]
                        );
//
//                        $sinhvien = new Sinh_Vien();
//                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'trung_binh'=> $value->trung_binh, ] );
//                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'tich_luy'=> $value->tich_luy, ] );
//                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'xep_loai'=> $value->xep_loai, ] );
//
                    }
    //            }
            });
        }


        // canh bao hoc vu
        else if($request->type_file == 'list_ad_canh_bao_hv') {
//        if(Auth::user()->username == 'congtacsinhvien')
            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
//                    $tmp = Sinh_Vien::find($value->mssv);
//                    if($tmp ) {

                    $p_dao_tao = new P_Dao_Tao();
                    $form_diem = Form_Diem::all();
                    $tru_diem = $form_diem[0]->tru_canh_cao;

                    $p_dao_tao::updateOrCreate(
                        [ 'mssv'=> $value->mssv, ],
                        [
                            'point_dao_tao'=> $tru_diem,
                              //'mssv'=> $value->mssv,
                            'canh_bao_hv' => $value-> canh_bao_hv,


                        ]
                    );
//
 //                       $p_dao_tao = new P_Dao_Tao();
 //                       $p_dao_tao::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'canh_bao_hv'=> $value->canh_bao_hv, ] );
//                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'tich_luy'=> $value->tich_luy, ] );
//                        $sinhvien::updateOrCreate(  [ 'mssv'=> $value->mssv, ], [ 'xep_loai'=> $value->xep_loai, ] );
//
                }
                //            }
            });
        }


        // hoat dong doan
        else if($request->type_file == 'list_ad_class_tham_gia_hoatdong') {

            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
                    //  $tmp = Sinh_Vien::find($value->mssv);
                    //  if($tmp ) {

                    $p_Doan = new P_Doan();
                    $form_diem = Form_Diem::all();
                    $tru_diem = $form_diem[0]->tru_khong_tham_gia;

                    $p_Doan::updateOrCreate(
                        [ 'mssv'=> $value->mssv, ],
                        [
                            'point_doan'=> $tru_diem,
                            //     'mssv'=> $value->mssv,
                            'tham_gia' => $value-> tham_gia,



                        ]
                    );


                }
            });
        }

        //khen_thuong_doan

        else if($request->type_file == 'list_ad_khen_thuong_doan') {

            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
                    //  $tmp = Sinh_Vien::find($value->mssv);
                    //  if($tmp ) {

                    $p_Doan = new P_Doan();
                    $form_diem = Form_Diem::all();
                    $cong_diem = $form_diem[0]->cong_tham_gia_truong;

                    $p_Doan::updateOrCreate(
                        [ 'mssv'=> $value->mssv, ],
                        [
                            'point_doan'=> $cong_diem,
                            //     'mssv'=> $value->mssv,
                            'khen_thuong_doan' => $value-> khen_thuong_doan,



                        ]
                    );


                }
            });
        }

        // vi pham quy che thi

        else if($request->type_file == 'list_vi_pham_quyche_thi') {

            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {
                  //  $tmp = Sinh_Vien::find($value->mssv);
                  //  if($tmp ) {

                        $p_dao_tao = new P_Dao_Tao();
                        $form_diem = Form_Diem::all();
                        $tru_diem = $form_diem[0]->tru_khien_trach_thi;

                        $p_dao_tao::updateOrCreate(
                            [ 'mssv'=> $value->mssv, ],
                            [
                                'point_cong_tac_sv'=> $tru_diem,
                           //     'mssv'=> $value->mssv,
                                'mon_vi_pham' => $value-> mon_vi_pham,
                                'ngay_vp' => $value-> ngay_vp,


                            ]
                        );


                }
            });
        }

// sinh vien vi pham sh  cap khoa

        else if($request->type_file == 'list_ad_class_vi_pham_khoa') {

            Excel::load($request->fileExcels, function($reader){
                $results = $reader->all();
                foreach ($results as $key=>$value) {


                    $p_khoa = new P_Khoa();
                    $form_diem = Form_Diem::all();
                    $tru_diem = $form_diem[0]->tru_phe_binh;

                    $p_khoa::updateOrCreate(
                        [ 'mssv'=> $value->mssv, ],
                        [
                            'point_khoa'=> $tru_diem,
                            //     'mssv'=> $value->mssv,
                            'vi_pham_sh_khoa' => $value-> vi_pham_sh_khoa,



                        ]
                    );


                }
            });
        }




        return Redirect()->route('listclass');
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

    public function list_sinh_vien() {
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

        return View('admin.done_import')->with([
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }


    // danh sach doan vien

    public function listDoanVien() {
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

        return View('admin.doanVien.listDoanVien')->with([
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }

    // demo new
    public function demo() {
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

        return View('admin.doanvien')->with([
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }
    
    // co van hoc tap 

    public function listCoVanHocTap() {
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

        return View('admin.coVanHocTap.listCoVanHocTap')->with([
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }

    public function khenThuong() {
        $sinhvien = Sinh_Vien::all();
        $diem = Points::all();
        $listClass = [];
        for($i = 0; $i < count($sinhvien); $i++){
//            $sinhvien[$i]->point = 0;
//            for($j = 0; $j < count($diem)-1 ; $j++) {
//                if($diem[$j]->mssv == $sinhvien[$i]->mssv){
//                    $sinhvien[$i]->point = $diem[$j]->point_total;
//                }
//            }
            $listClass[$i] = $sinhvien[$i]->class;
        }
        $listClass = array_unique($listClass);

        return View('admin.khenThuong.khen_thuong')->with([
            'list_sinh_vien' =>$sinhvien,
            'list_diem_ren_luyen' =>$diem,
            'list_class' =>$listClass
        ]);
    }
//    public function khenThuong() {
//        $sinhvien = Sinh_Vien::all();
//        $diem = Points::all();
//        $listClass = [];
//        for($i = 0; $i < count($sinhvien); $i++){
//            $sinhvien[$i]->point = 0;
//            for($j = 0; $j < count($diem)-1 ; $j++) {
//                if($diem[$j]->mssv == $sinhvien[$i]->mssv){
//                    $sinhvien[$i]->point = $diem[$j]->point_total;
//                }
//            }
//            $listClass[$i] = $sinhvien[$i]->khen_thuong;
//        }
//        $listClass = array_unique($listClass);
//
//        return View('admin.khenThuong.khen_thuong')->with([
//            'list_sinh_vien' =>$sinhvien,
//            'list_diem_ren_luyen' =>$diem,
//            'list_class' =>$listClass
//        ]);
//    }
    
    // xu ly phan hoi 
    
    public function phanhoi(){
        return view('admin.phanHoi.phan_hoi');
    }

    public function listofclass ($class) {
        $sinhvien = Sinh_Vien::all();
        $diem = Points::all();
        $listClass = [];
        $listSinhVienLop = [];

        if($class == 'tatca') {
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

            return [
                'list_sinh_vien' =>$sinhvien,
                'list_diem_ren_luyen' =>$diem,
                'list_class' =>$listClass
            ];
        }
        else {
            for($i = 0; $i < count($sinhvien); $i++){
                if($sinhvien[$i]->class == $class){
                    $listSinhVienLop[$i] = $sinhvien[$i];
                    $listSinhVienLop[$i]->point = 0;
                    for($j = 0; $j < count($diem)-1 ; $j++) {
                        if($diem[$j]->mssv == $listSinhVienLop[$i]->mssv){
                            $listSinhVienLop[$i]->point = $diem[$j]->point_total;
                        }
                    }
                    $listClass[$i] = $sinhvien[$i]->class;
                }

            }
            $listSinhVienLop = array_unique($listSinhVienLop);
            return [
                'list_sinh_vien' =>$listSinhVienLop,
                'list_diem_ren_luyen' =>$diem,
                'list_class' =>$listClass
            ];
        }

    }
}