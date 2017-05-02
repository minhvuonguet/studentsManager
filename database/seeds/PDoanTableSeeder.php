<?php

use Illuminate\Database\Seeder;
use App\Models\P_Doan;
class PDoanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        P_Doan::create([
            'mssv' => 13000000,
            'fullname' => 'Đặng Danh Phươngtttttttttt',
            'class' => 'K58CC',
            'office' => 'Học Sinh',
            'email' => 'yanglong.ph@gmail.com',
            'birthday' =>'1995-1-31'

        ]);
        P_Doan::create([
            'mssv' => 13000001,
            'fullname' => 'Đặng Danh Phương',
            'class' => 'K58CC',
            'office' => 'Học Sinh',
            'email' => 'yanglong.ph@gmail.com',
            'birthday' =>'1995-1-31'

        ]);
        P_Doan::create([
            'mssv' => 13000002,
            'fullname' => 'Đặng Danh Phương',
            'class' => 'K58CC',
            'office' => 'Học Sinh',
            'email' => 'yanglong.ph@gmail.com',
            'birthday' =>'1995-1-31'

        ]);
        P_Doan::create([
            'mssv' => 13000003,
            'fullname' => 'Đặng Danh Phương',
            'class' => 'K58CC',
            'office' => 'Học Sinh',
            'email' => 'yanglong.ph@gmail.com',
            'birthday' =>'1995-1-31'

        ]);
        P_Doan::create([
            'mssv' => 13000880,
            'fullname' => 'Nguyễn thanh hải',
            'class' => 'K59DC',
            'office' => 'Giáo Viên',
            'email' => 'haha.uet.vnu',
            'birthday' =>'1995-1-31'

        ]);
        P_Doan::create([
            'mssv' => 13000112,
            'fullname' => 'Đặng Danh Phương',
            'class' => 'K58CC',
            'office' => 'Học Sinh',
            'email' => 'yanglong.ph@gmail.com',
            'birthday' =>'1995-1-31'

        ]);
    }
}
