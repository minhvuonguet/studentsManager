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
        switch ($user->id_role) {
            case '3':
                $data = Form_Diem::all();
                return View('Employee.indexStudents')->With([
                    'data' => $data,
                    'user' => $user,
                    'sinhvien' => $sinhvien
                ]);
                break;
            case '2':
                return view('admin.adminManager');
                break;
            case '1':
                return view('admin.adminManager');
                break;
            // default:
            //     return redirect()->route('login');
            //     break;
        }
    }
}
