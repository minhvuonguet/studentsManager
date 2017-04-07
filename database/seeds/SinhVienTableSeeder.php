<?php

use Illuminate\Database\Seeder;
use App\Models\Sinh_Vien;

class SinhVienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('sinh_vien')->truncate();
        Sinh_Vien::create([
          'mssv' => 13000000,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13000001,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13000002,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13000003,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13000880,
          'fullname' => 'Nguyễn thanh hải',
          'class' => 'K59DC',
          'office' => 'Giáo Viên',
          'email' => 'haha.uet.vnu',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13020553,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13020554,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13020555,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);
        Sinh_Vien::create([
          'mssv' => 13020556,
          'fullname' => 'Đặng Danh Phương',
          'class' => 'K58CC',
          'office' => 'Học Sinh',
          'email' => 'yanglong.ph@gmail.com',
          'birthday' =>'1995-1-31'
        ]);

    }
}
