<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\SubkriteriaModel;
use App\Libraries\SawLib as SawLib;

class Saw extends BaseController
{

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subKriteriaModel = new SubkriteriaModel();
    }

    public function index()
    {

        $dataKriteria = $this->kriteriaModel->findAll();
        $dataPeserta = $this->pesertaModel->findAllPeserta();
        $dataSubkriteria = $this->subKriteriaModel->findAll();


        $saw = new SawLib($dataPeserta, $dataKriteria, $dataSubkriteria);

        // dd($dataKriteria);
        // dd($dataPeserta);
        dd($saw);
        // $alternatives = array(
        //     array("A1", 3, 2, 1, 1),
        //     array("A2", 2, 1, 2, 4),
        //     array("A3", 2, 3, 3, 1),
        //     array("A4", 3, 2, 3, 3),
        //     array("A5", 1, 4, 2, 4),
        //     array("A6", 4, 3, 1, 3),
        //     array("A7", 3, 2, 2, 1),
        //     array("A8", 1, 3, 4, 4)
        // );

        // $criteria = [
        //     ["K1" => 40],
        //     ["K2", 30],
        //     ["K3", 20],
        //     ["K4", 10],
        // ];

        // $saw = new SawLib($alternatives, $criteria);
        // $saw->hitungBobotKriteria();
        // $saw->hitungNormalisasi();
        // $saw->hitungNilaiAkhir();
        // $rangking = $saw->getRangking();

        // echo "Rangking: " . implode(", ", $rangking) . "\n";
    }
}
