<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Route::get('/', ['as' => 'home', 'uses' => 'HomeController@goToHome']);

//Route::get('home', ['as' => 'home', 'uses' => 'HomeController@goToHome']);

Route::get('ViewUser', ['as' => 'ViewUser', 'uses' => 'StudentsControler@ViewUser']);
//accout  Hiển thị thông tin tài khoản
Route::get('account', ['as' => 'account', 'uses' => 'StudentsControler@account']);
//report báo cáo lỗi hay khiếu nại, thắc mắc
Route::get('report', ['as' => 'report', 'uses' => 'StudentsControler@report']);
//view hiển thị điểm, danh sách Excels tùy tài khoản
Route::get('view', ['as' => 'view', 'uses' => 'ViewController@view']);


//readExcels Đọc file Excels theo từng tài khoản
Route::get('readExcels', ['as' => 'readExcels', 'uses' => 'DatabaseController@readExcels']);
Route::post('updateDB', ['as' => 'updateDB', 'uses' => 'DatabaseController@updateDB']);
//createNew Tạo Học Kỳ mới, lớp mới, học sinh mới...
Route::get('createNew', ['as' => 'createNew', 'uses' => 'DatabaseController@createNew']);

Route::group(['middleware' => ['web']], function () {
    // admin va phong cong tac sinh vien
    Route::get('/login', ['as' => 'login', 'uses' => 'AdminControler@getLogin']);
    Route::post('/postLogin', ['as' => 'postLogin', 'uses' => 'AdminControler@postLogin']);
    // Route::get('sendmail', ['as' => 'sendmail', 'uses' => 'AdminControler@sendmail']);
    Route::post('/message/send', ['uses' => 'FrontController@addFeedback', 'as' => 'front.fb']);

    //Form can't work
    Route::get('formdiem', ['as' => 'formdiem', 'uses' => 'AdminControler@formdiem']);
    Route::get('newclass', ['as' => 'newclass', 'uses' => 'AdminControler@newclass']);
    Route::post('postnewclass', ['as'=>'postnewclass','uses'=>'AdminControler@postnewclass']);
    Route::get('tinhdiem', ['as' => 'tinhdiem', 'uses' => 'CacularPoint@tinhdiem']);
    Route::post('update/{id}/{chu_de}', ['as'=>'update', 'uses'=>'AdminControler@updatePoint']);
    Route::get('listclass', ['as'=>'listclass', 'uses'=>'AdminControler@listclass']);
    Route::get('done_import', ['as'=>'done_import', 'uses'=>'AdminControler@list_sinh_vien']);



    ///
    Route::get('khenThuong.khen_thuong', ['as' => 'khenThuong.khen_thuong', 'uses' => 'covanController@khen_thuong']);

    Route::get('phongDaoTao.xem_diem', ['as' => 'phongDaoTao.xem_diem', 'uses' => 'DaoTaoController@xem_diem']);

//    Route::get('doanVien.listDoanVien', ['as'=>'doanVien.listDoanVien', 'uses'=>'AdminControler@listDoanVien']);
//    Route::get('coVanHocTap.listCoVanHocTap', ['as'=>'coVanHocTap.listCoVanHocTap', 'uses'=>'AdminControler@listCoVanHocTap']);
//
    Route::get('phanHoi.phan_hoi', ['as'=>'phanHoi.phan_hoi', 'uses'=>'AdminControler@phanhoi']);
//
//    Route::get('khenThuong.khen_thuong', ['as'=>'khenThuong.khen_thuong', 'uses'=>'AdminControler@khenThuong']);
//
//    // van phong doan
//
//
    Route::get('doanvien', ['as'=>'doanvien', 'uses'=>'VPDoanController@demo']);
    Route::get('dangvien', ['as'=>'dangvien', 'uses'=>'VPDoanController@dangvien']);
    Route::get('doanVien.listDoanVien', ['as'=>'doanVien.listDoanVien', 'uses'=>'AdminControler@xem_diem_ren_luyen']);
//    Route::get('hoat_dong_doan', ['as'=>'hoat_dong_doan', 'uses'=>'VPDoanController@hoat_dong_doan']);
    Route::get('doanVien.khen_thuong', ['as'=>'doanVien.khen_thuong', 'uses'=>'VPDoanController@khen_thuong']);
    Route::get('doanVien.vi_pham', ['as'=>'doanVien.vi_pham', 'uses'=>'VPDoanController@vi_pham']);
//    Route::get('doanVien.newClass', ['as' => 'doanVien.newClass', 'uses' => 'VPDoanController@newclass']);
//
//
//    // co van học tập
//
//    Route::get('coVanHocTap.khen_thuong', ['as' => 'coVanHocTap.khen_thuong', 'uses' => 'covanController@khen_thuong']);
    Route::get('coVanHocTap.listclass', ['as' => 'coVanHocTap.listclass', 'uses' => 'covanController@listclass']);
    Route::get('coVanHocTap.vi_pham', ['as' => 'coVanHocTap.vi_pham', 'uses' => 'covanController@vi_pham']);
//    Route::get('coVanHocTap.xem_diem', ['as' => 'coVanHocTap.xem_diem', 'uses' => 'covanController@xem_diem']);
//    Route::get('coVanHocTap.newimport', ['as' => 'coVanHocTap.newimport', 'uses' => 'covanController@newimport']);
//
//    // phong dao tao
//
//
//    Route::get('phongDaoTao.newimport', ['as' => 'phongDaoTao.newimport', 'uses' => 'DaoTaoController@newimport']);
//    Route::get('phongDaoTao.diem_hoc_tap', ['as' => 'phongDaoTao.diem_hoc_tap', 'uses' => 'DaoTaoController@diem_hoc_tap']);
//    Route::get('phongDaoTao.listclass', ['as' => 'phongDaoTao.listclass', 'uses' => 'DaoTaoController@listclass']);
//    Route::get('phongDaoTao.canh_bao_hv', ['as' => 'phongDaoTao.canh_bao_hv', 'uses' => 'DaoTaoController@canh_bao_hv']);
    Route::get('phongDaoTao.vi_pham_quyche', ['as' => 'phongDaoTao.vi_pham_quyche', 'uses' => 'DaoTaoController@vi_pham_quyche']);
//
//
//// phong KHCN
//
//    Route::get('phongkhcn.newimport', ['as' => 'phongkhcn.newimport', 'uses' => 'PhongkhcnController@newimport']);
    Route::get('phongkhcn.listclass', ['as' => 'phongkhcn.listclass', 'uses' => 'PhongkhcnController@listclass']);
//    Route::get('phongkhcn.giai_thuong', ['as' => 'phongkhcn.giai_thuong', 'uses' => 'PhongkhcnController@giai_thuong']);
//
//
//    // văn phong khoa
//
//
//    Route::get('vanPhongKhoa.newimport', ['as' => 'vanPhongKhoa.newimport', 'uses' => 'vanphongkhoa@newimport']);
    Route::get('vanPhongKhoa.vi_pham', ['as' => 'vanPhongKho.vi_pham', 'uses' => 'vanphongkhoa@vi_pham']);
//    Route::get('vanPhongKhoa.khen_thuong', ['as' => 'vanPhongKhoa.khen_thuong', 'uses' => 'vanphongkhoa@giai_thuong']);
    Route::get('vanPhongKhoa.xem_diem', ['as' => 'vanPhongKhoa.xem_diem', 'uses' => 'vanphongkhoa@xem_diem']);
//    Route::get('vanPhongKhoa.listclass', ['as' => 'vanPhongKhoa.listclass', 'uses' => 'vanphongkhoa@listclass']);
//
//
//
//




    Route::post('listofclass/{class}', ['as'=>'listofclass', 'uses'=>'AdminControler@listofclass']);
   // Route::get('tinhdiem', ['as'=>'tinhdiem', 'use'=>'CacularPont@tinhdiem']);


    Route::group(['middleware' => 'auth'], function () {
     //   Route::get('/', ['as' => '/', 'uses' => 'AdminControler@ViewUser']);
        Route::get('list', ['as' => 'list', 'uses' => 'AdminControler@listUser']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'AdminControler@getLogout']);
        Route::get('newterm', ['as' => 'newterm', 'uses' => 'AdminControler@newterm']);
        Route::post('postnewterm', ['as' => 'postnewterm', 'uses' => 'AdminControler@postnewterm']);
        Route::get('formdiem', ['as' => 'formdiem', 'uses' => 'AdminControler@formdiem']);
        Route::get('newclass', ['as' => 'newclass', 'uses' => 'AdminControler@newclass']);
        Route::post('postnewclass', ['as'=>'postnewclass','uses'=>'AdminControler@postnewclass']);
        Route::get('tinhdiem', ['as' => 'tinhdiem', 'uses' => 'CacularPoint@tinhdiem']);
        Route::post('update/{id}/{chu_de}', ['as'=>'update', 'uses'=>'AdminControler@updatePoint']);
        Route::get('listclass', ['as'=>'listclass', 'uses'=>'AdminControler@listclass']);
        Route::get('done_import', ['as'=>'done_import', 'uses'=>'AdminControler@list_sinh_vien']);

        Route::get('khenThuong.khen_thuong', ['as' => 'khenThuong.khen_thuong', 'uses' => 'covanController@khen_thuong']);

        Route::get('phongDaoTao.xem_diem', ['as' => 'phongDaoTao.xem_diem', 'uses' => 'DaoTaoController@xem_diem']);


        Route::get('doanvien', ['as'=>'doanvien', 'uses'=>'VPDoanController@demo']);

        Route::get('doanVien.khen_thuong', ['as'=>'doanVien.khen_thuong', 'uses'=>'VPDoanController@khen_thuong']);

        Route::get('coVanHocTap.listclass', ['as' => 'coVanHocTap.listclass', 'uses' => 'covanController@listclass']);

        Route::get('phongDaoTao.vi_pham_quyche', ['as' => 'phongDaoTao.vi_pham_quyche', 'uses' => 'DaoTaoController@vi_pham_quyche']);

        Route::get('phongkhcn.listclass', ['as' => 'phongkhcn.listclass', 'uses' => 'PhongkhcnController@listclass']);

        Route::get('vanPhongKhoa.xem_diem', ['as' => 'vanPhongKhoa.xem_diem', 'uses' => 'vanphongkhoa@xem_diem']);


        Route::post('listofclass/{class}', ['as'=>'listofclass', 'uses'=>'AdminControler@listofclass']);

        // Route work for term
        Route::post('change_present_term/{id}', ['as'=>'change_present_term', 'uses'=>'AdminControler@change_present_term']);
        Route::post('change_present_term/{id}', ['as'=>'change_present_term', 'uses'=>'AdminControler@change_present_term']);
        Route::post('delete_term/{id}', ['as'=>'delete_term', 'uses'=>'AdminControler@delete_term']);
    });

});


    // VPDoanController,hoat_dong_doan

