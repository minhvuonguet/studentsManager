<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Co_Van_Hoc_Tap;
use App\Models\Hoc_Ky;
use App\Models\P_Cong_Tac_SV;
use App\Models\P_Dao_Tao;
use App\Models\P_Doan;
use App\Models\P_Khoa_Hoc_CN;
use App\Models\P_Khoa;
use App\Models\Points;
use App\Models\Sinh_Vien;
use App\Models\User;


class CacularPoint extends Controller
{
    public $defaultPoint = 100;

    public function CaculPoint ($subPoint) {

        return 0;
    }
    public function tinhdiem () {
        $Students = Sinh_Vien::all();
        $covan = new Co_Van_Hoc_Tap();
        $Hocky = Hoc_Ky::all();
        $P_ctsv = new P_Cong_Tac_SV();
        $P_daotao = new P_Dao_Tao();
        $P_doan = new P_Doan();
        $P_khcn = new P_Khoa_Hoc_CN();
        $P_khoa = new P_Khoa();
        $Point = new Points();
      //  $this->diem($covan);

        $this->diem($covan, 'covan');
        $this->diem($P_ctsv, 'ctsv');
        $this->diem($P_daotao,'daotao');
        $this->diem($P_doan, 'doan');
        $this->diem($P_khcn, 'khcn');
        $this->diem($P_khoa, 'khoa');

    }
    public function diem ($table, $type) {
        // neu khong co thi ghi vao dong moi. neu co roi thi update.
        $hocky = Hoc_Ky::all();
        $Point = new Points();
        $instanceTable = $table::all();
        $instancePoint = $Point::all();

        for($i = 0; $i < count($instanceTable); $i++) {

//            $Point::updateOrCreate(
//                [
//                'mssv'=>$instanceTable[$i]->mssv,
//                ],
//                [
//                    'id_hoc_ky' => $hocky[0]->id_hoc_ky,
//                    'point_co_van_hoc_tap' => $this->getTypeDepar($table, 'co_van_hoc_tap'),
//                    'point_ctsv' => $instanceTable[$i]->$this->getTypeDepar($table, 'p_cong_tac_sv'),
//                    'point_daotao' => $instanceTable[$i]->$this->getTypeDepar($table, 'p_dao_tao'),
//                    'point_doan' => $instanceTable[$i]->$this->getTypeDepar($table, 'p_doan'),
//                    'point_khoa_hoc_cn' => $instanceTable[$i]->$this->getTypeDepar($table, 'p_khoa_hoc_cn'),
//                    'point_khoa' => $instanceTable[$i]->$this->getTypeDepar($table, 'p_khoa'),
//                ]
//            );
            $Point->mssv = $instanceTable[$i]->mssv;
            $this->getTypeDepar($Point, $instanceTable[$i]);
            $Point->id_hoc_ky = $hocky[0]->id_hoc_ky;
        }
        echo $Point;

//        $Point->save();
//        $this->updatePoint();
    }
    public function updatePoint () {
//        $intancePoint = new Points();
//        $point = Points::all();
//        $tmpData = null;
//        for ($i = 0; $i < count($point); $i++) {
//            for($j = 0; $j < count($point) -1; $j++ ) {
//                if($point[$i]->mssv == $point[$j]->mssv) {
//                    $intancePoint->mssv = $point[$j]->mssv;
//                    $intancePoint->id_hoc_ky = $point[$j]->id_hoc_ky;
//                    $intancePoint-> = $point[$j]->mssv;
//                    $intancePoint->mssv = $point[$j]->mssv;
//                    $intancePoint->mssv = $point[$j]->mssv;
//                    $intancePoint->mssv = $point[$j]->mssv;
//                    $intancePoint->mssv = $point[$j]->mssv;
//                    $intancePoint->mssv = $point[$j]->mssv;
//                    $intancePoint->mssv = $point[$j]->mssv;
//                }
//            }
//        }
    }
    public function getTypeDepar ($Point, $table) {

        switch ($table->getTableName()) {
            case 'co_van_hoc_tap' :
                return  $Point->point_co_van_hoc_tap = $table->point_co_van_hoc_tap;
                break;

            case 'p_doan' :
                return  $Point->point_doan = $table->point_doan;
                break;
            case 'p_khoa_hoc_cn' :
                return  $Point->point_khoa_hoc_cn = $table->point_khoa_hoc_cn;
                break;

            case 'p_dao_tao' :
                return  $Point->point_dao_tao = $table->point_dao_tao;
                break;

            case 'p_khoa' :
                return  $Point->point_khoa = $table->point_khoa;
                break;

            case 'p_cong_tac_sv' :
                return  $Point->point_cong_tac_sv = $table->point_cong_tac_sv;
                break;
        }
    }
}
