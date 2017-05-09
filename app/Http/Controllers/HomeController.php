<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Form_Diem;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function goStudents(Request $request){
        $data = Form_Diem::all();
        $user= $request->session()->get('user');
        return View('Employee.indexStudents')->With([
            'data' => $data,
            'user' => $user
        ]);
    }

    public function goToHome(Request $request)
    {
        $user= $request->session()->get('user');
        $sinhvien = $request->session()->get('sinhvien');
        if($user==null){
            return redirect()->route('login');
        }else{
            switch ($user->id_role) {
                case '4':
                    return view('role2+4.covanhoctap')->With([
                        'user' => $user,
                        'sinhvien' => $sinhvien
                    ]);
                    break;
                case '3':
                    $data = Form_Diem::all();
                    return View('Employee.indexStudents')->With([
                        'data' => $data,
                        'user' => $user,
                        'sinhvien' => $sinhvien
                    ]);
                    break;
                case '2':
                    switch ($user->username) {
                        case 'phongdaotao':
                            return view('role2+4.phongdaotao')->With([
                                'user' => $user,
                                'sinhvien' => $sinhvien
                            ]);
                            break;
                        case 'phongkhcn':
                            return view('role2+4.phongkhcn')->With([
                                'user' => $user,
                                'sinhvien' => $sinhvien
                            ]);
                            break;
                        case 'vanphongdoan':
                            return view('role2+4.vanphongdoan')->With([
                                'user' => $user,
                                'sinhvien' => $sinhvien
                            ]);
                            break;
                        case 'vanphongkhoa':
                            return view('role2+4.vanphongkhoa')->With([
                                'user' => $user,
                                'sinhvien' => $sinhvien
                            ]);
                            break;
                    }
                    break;
                case '1':
                    return view('admin.adminManager')->With([
                        'user' => $user,
                        'sinhvien' => $sinhvien
                    ]);
                    break;
                case 'null':
                    return redirect()->route('login');
                    break;
                default:
                    return redirect()->route('login');
                    break;
            }
        }
    }
}
