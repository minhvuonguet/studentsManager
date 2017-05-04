<?php

use Illuminate\Database\Seeder;
use App\Models\P_Khoa;
class PKhoaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        P_Khoa::create([
            'point_khoa' =>5,
            'mssv' => 13000003,
        ]);
        P_Khoa::create([
            'point_khoa' =>5,
            'mssv' => 13000004,
        ]);
        P_Khoa::create([
            'point_khoa' =>10,
            'mssv' => 13000005,
        ]);
    }
}
