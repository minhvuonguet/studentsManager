<?php

use Illuminate\Database\Seeder;
use App\Models\P_Dao_Tao;
class PDaoTaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        P_Dao_Tao::create([
            'point_dao_tao' =>0,
            'mssv' => 13000000,

        ]);
        P_Dao_Tao::create([
            'point_dao_tao' =>5,
            'mssv' => 13000001,

        ]);
    }
}
