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
            'mssv' => 13000000,
            'id_role'=>1
        ]);
        User::create([
            'username'=>'phongctsv',
            'password'=>Hash::make('phongctsv'),
            'mssv' => 13000001,
            'id_role'=>1
        ]);
        User::create([
            'username'=>'vanphongdoan',
            'password'=>Hash::make('vanphongdoan'),
            'mssv' => 13000002,
            'id_role'=>2
        ]);
        User::create([
            'username'=>'students1',
            'password'=>Hash::make('students1'),
            'mssv' => 13000003,
            'id_role'=>3
        ]);
        User::create([
            'username'=>'phongKHCN',
            'password'=>Hash::make('phongKHCN'),
            'mssv' => 13020553,
            'id_role'=>2
        ]);
        User::create([
            'username'=>'vanphongkhoa',
            'password'=>Hash::make('vanphongkhoa'),
            'mssv' => 13020554,
            'id_role'=>2
        ]);
        User::create([
            'username'=>'covanhoctap',
            'password'=>Hash::make('covanhoctap'),
            'mssv' => 13020555,
            'id_role'=>2
        ]);
        User::create([
            'username'=>'phongdaotao',
            'password'=>Hash::make('phongdaotao'),
            'mssv' => 13020556,
            'id_role'=>2
        ]);
    }
}
