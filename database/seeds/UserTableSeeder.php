<?php
use Illuminate\Database\Seeder;
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
        User::create([
            'username'=>'admin1',
            'password'=>Hash::make('admin1'),
            'email'=>'admin1@gmail.com',
            'mssv' => 1,
            'id_role'=>1
        ]);
        User::create([
            'username'=>'phongctsv',
            'password'=>Hash::make('phongctsv'),
            'email'=>'phongctsv@gmail.com',
            'mssv' => 2,
            'id_role'=>2
        ]);


        User::create([
            'username'=>'phongdaotao',
            'password'=>Hash::make('phongdaotao'),
            'email'=>'phongdaotao@gmail.com',
            'mssv' => 3,
            'id_role'=>2
        ]);
        User::create([
            'username'=>'khoahoccongnghe',
            'password'=>Hash::make('khoahoccongnghe'),
            'email'=>'khoahoccongnghe@gmail.com',
            'mssv' => 4,
            'id_role'=>1
        ]);
        User::create([
            'username'=>'vanphongdoan',
            'password'=>Hash::make('vanphongdoan'),
            'email'=>'vanphongdoan@gmail.com',
            'mssv' => 5,
            'id_role'=>2
        ]);
        User::create([
            'username'=>'vanphongkhoa',
            'password'=>Hash::make('vanphongkhoa'),
            'email'=>'vanphongkhoa@gmail.com',
            'mssv' => 6,
            'id_role'=>2
        ]);

        User::create([
            'username'=>'covank58cc',
            'password'=>Hash::make('covank58cc'),
            'email'=>'covank58cc@gmail.com',
            'mssv' => 7,
            'id_role'=>4
        ]);

        User::create([
            'username'=>'students1',
            'password'=>Hash::make('students1'),
            'mssv' => 13000003,
            'id_role'=>3
        ]);
        User::create([
            'username'=>'students2',
            'password'=>Hash::make('students2'),
            'mssv' => 13000004,
            'id_role'=>3
        ]);
        User::create([
            'username'=>'students3',
            'password'=>Hash::make('students3'),
            'mssv' => 13000005,
            'id_role'=>3
        ]);

    }
}
