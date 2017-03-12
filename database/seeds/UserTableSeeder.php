<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;
use App\Models\User;

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
            'name'=>'students1',
            'email'=>'students1@gmail.com',
            'password'=>\Hash::make('students1'),
            'role_id'=>$role2->id,
            'office'=>'Students',
            'changePass'=>0
        ]);
    }
}
