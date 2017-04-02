<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;
use App\Models\Hocky;
use App\Models\User_Point;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Roles::create([
            'name'=>'Administrator',
            'role_id'=>'1'
        ]);
        $role1 = Roles::create([
            'name'=>'Editor',
            'role_id'=>'2'
        ]);
        $role2 = Roles::create([
            'name'=>'member',
            'role_id'=>'3'
        ]);
        $hocky = Hocky::create([
            'ma_hk'=>'HK1_2017'
        ]);
        User::create([
            'name'=>'admin1',
            'email'=>'admin@gmail.com',
            'password'=>\Hash::make('admin1'),
            'role_id'=>$role->id,
            'office'=>'Admin',
            'changePass'=>0
        ]);
        User::create([
            'name'=>'phongctsv',
            'email'=>'phongctsv@gmail.com',
            'password'=>\Hash::make('phongctsv'),
            'role_id'=>$role1->id,
            'office'=>'Phong CTSV',
            'changePass'=>0
        ]);
        User::create([
            'name'=>'vanphongdoan',
            'email'=>'vanphongdoan@gmail.com',
            'password'=>\Hash::make('vanphongdoan'),
            'role_id'=>$role1->id,
            'office'=>'Van Phong Doan',
            'changePass'=>0
        ]);
        User::create([
            'name'=>'vanphongkhoa',
            'email'=>'vanphongkhoa@gmail.com',
            'password'=>\Hash::make('vanphongkhoa'),
            'role_id'=>$role1->id,
            'office'=>'Van Phong Khoa',
            'changePass'=>0
        ]);
        User::create([
            'name' => 'students1',
            'email' => 'students1@gmail.com',
            'password' => \Hash::make('students1'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020706,
            'hoten' => 'nguyen Nhu Vuong',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);

        User::create([
            'name' => 'students2',
            'email' => 'students2@gmail.com',
            'password' => \Hash::make('students2'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020707,
            'hoten' => 'Nguyen Van A',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students3',
            'email' => 'students3@gmail.com',
            'password' => \Hash::make('students3'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020708,
            'hoten' => 'nguyen Van B',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students4',
            'email' => 'students4@gmail.com',
            'password' => \Hash::make('students4'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020709,
            'hoten' => 'nguyen Van C',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students5',
            'email' => 'students5@gmail.com',
            'password' => \Hash::make('students5'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020710,
            'hoten' => 'nguyen Van D',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students6',
            'email' => 'students6@gmail.com',
            'password' => \Hash::make('students6'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020711,
            'hoten' => 'nguyen Van E',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students7',
            'email' => 'students7@gmail.com',
            'password' => \Hash::make('students7'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020712,
            'hoten' => 'nguyen Van F',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students8',
            'email' => 'students8@gmail.com',
            'password' => \Hash::make('students8'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020713,
            'hoten' => 'nguyen Van G',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);
        User::create([
            'name' => 'students9',
            'email' => 'students9@gmail.com',
            'password' => \Hash::make('students9'),
            'role_id' => $role2->id,
            'office'=>'Students',
            'mssv' => 13020714,
            'hoten' => 'nguyen Van H',
            'lop' => 'k58cc',
            'changePass'=>0,
        ]);

//
//        User_Point::create([
//            'ctsv'=>0,
//            'daotao' => 10,
//            'khoa_hoc_cong_nghe' => -10,
//            'van_phong_doan' => 20,
//            'co_van_hoc_tap' => 0,
//            'van_phong_khoa' => 10,
//            'mssv' => 13020706,
//            'other' => 0,
//            'sum' => 70,
//            'note' => ''
//        ]);
//        User_Point::create([
//            'ctsv'=>0,
//            'daotao' => 10,
//            'khoa_hoc_cong_nghe' => -10,
//            'van_phong_doan' => 20,
//            'co_van_hoc_tap' => 10,
//            'van_phong_khoa' => 10,
//            'mssv' => 13020707,
//            'other' => -7,
//            'sum' => 70,
//            'note' => ''
//        ]);
//        User_Point::create([
//            'ctsv'=>0,
//            'daotao' => 10,
//            'khoa_hoc_cong_nghe' => -10,
//            'van_phong_doan' => 20,
//            'co_van_hoc_tap' => -20,
//            'van_phong_khoa' => 0,
//            'mssv' => 13020708,
//            'other' => -10,
//            'sum' => 70,
//            'note' => ''
//        ]);
//        User_Point::create([
//            'ctsv'=>0,
//            'daotao' => 10,
//            'khoa_hoc_cong_nghe' => -10,
//            'van_phong_doan' => 20,
//            'co_van_hoc_tap' => 10,
//            'van_phong_khoa' => -10,
//            'mssv' => 13020710,
//            'other' => -20,
//            'sum' => 70,
//            'note' => ''
//        ]);
//        User_Point::create([
//            'ctsv'=>0,
//            'daotao' => -10,
//            'khoa_hoc_cong_nghe' => -10,
//            'van_phong_doan' => 20,
//            'co_van_hoc_tap' => 7,
//            'van_phong_khoa' => 10,
//            'mssv' => 13020711,
//            'other' => 0,
//            'sum' => 70,
//            'note' => ''
//        ]);
    }
}


