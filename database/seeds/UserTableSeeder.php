<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;
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
        // DB::table('roles')->truncate();
        // DB::table('users')->truncate();
        // DB::table('point')->truncate();
        $role = Roles::create([
            'name'=>'Administrator',
            'role_id'=>1
        ]);
        $role1 = Roles::create([
            'name'=>'Editor',
            'role_id'=>2
        ]);
        $role2 = Roles::create([
            'name'=>'member',
            'role_id'=>3
        ]);
        $role3 = Roles::create([
            'name'=>'viewers',
            'role_id'=>4
        ]);

        User::create([
            'mssv' => 13000000,
            'username'=>'admin1',
            'password'=>Hash::make('admin1'),
            // 'role_id'=>$role->'role_id',
            'role_id'=>1,
            'fullname'=>'dang sieu nhan',
            'email'=>'admin@gmail.com',
            'class'=>'k0AA',
            'office'=>'Admin',
            'birthday'=>'1995-1-1'
        ]);
        User::create([
            'mssv' => 10000000,
            'username'=>'phongctsv',
            'email'=>'phongctsv@gmail.com',
            'password'=>Hash::make('phongctsv'),
            // 'role_id'=>$role1->'role_id',
            'role_id'=>2,
            'office'=>'Phong CTSV',
        ]);
        User::create([
            'mssv' => 10000001,
            'username'=>'vanphongdoan',
            'email'=>'vanphongdoan@gmail.com',
            'password'=>Hash::make('vanphongdoan'),
            // 'role_id'=>$role1->'role_id',
            'role_id'=>2,
            'office'=>'Van Phong Doan',
        ]);
        User::create([
            'mssv' => 10000002,
            'username'=>'vanphongkhoa',
            'email'=>'vanphongkhoa@gmail.com',
            'password'=>Hash::make('vanphongkhoa'),
            // 'role_id'=>$role1->'role_id',
            'role_id'=>2,
            'office'=>'Van Phong Khoa',
        ]);
        User::create([
            'username' => 'students1',
            'email' => 'students1@gmail.com',
            'password' =>Hash::make('students1'),
            // 'role_id' => $role2->'role_id',
            'role_id'=>3,
            'office'=>'Students',
            'mssv' => 13020706,
            'fullname' => 'nguyen Nhu Vuong',
            'class' => 'k58cc',
        ]);
        User::create([
            'username' => 'phuongdd_58',
            'email' => 'yanglong.ph@gmail.com',
            'password' =>Hash::make('phuongdd_58'),
            // 'role_id' => $role->'role_id',
            'role_id'=>1,
            'office'=>'Students',
            'mssv' => 13020553,
            'fullname' => 'Dang Danh Phuong',
            'class' => 'k58cc',
            'birthday'=>'1995-1-1',
        ]);
        User_Point::create([
            'point_id'=>1302055311,
            'mssv'=>13020553,
            'hk_id'=>11,
            'nckh_point'=>25,
            'ytcd_point'=>24,
            'ytsv_point'=>23,
            'hddt_point'=>22,
        ]);
    }
}


