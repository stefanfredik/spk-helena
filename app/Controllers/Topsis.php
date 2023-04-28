<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\TopsisLib;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\SubkriteriaModel;

class Topsis extends BaseController
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


        $topsis = new TopsisLib($dataPeserta, $dataKriteria, $dataSubkriteria);

        dd($topsis);
    }
}
