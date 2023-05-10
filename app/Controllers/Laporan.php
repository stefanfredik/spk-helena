<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Libraries\SawLib;
use App\Libraries\TopsisLib;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\SubkriteriaModel;

class Laporan extends BaseController
{
    var $meta = [
        'url' => 'laporan',
        'title' => 'Laporan',
        'subtitle' => 'Halaman Laporan'
    ];

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
    }

    public function index()
    {

        // dd($this->laporan());

        $data = [
            'title' => $this->meta['title'],
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'peserta' => $this->laporan()
        ];

        return view('/laporan/index', $data);
    }


    private function laporan()
    {
        $this->pesertaModel = new PesertaModel();
        $this->kriteriaModel = new KriteriaModel();
        $this->subkriteriaModel = new SubkriteriaModel();

        $peserta = $this->pesertaModel->findAllPeserta();
        $kriteria = $this->kriteriaModel->findAll();
        $subkriteria = $this->subkriteriaModel->findAll();

        $saw = new SawLib($peserta, $kriteria, $subkriteria);
        $topsis = new TopsisLib($peserta, $kriteria, $subkriteria);

        $sawPeserta = $saw->getAllPeserta();
        $topsisPeserta = $topsis->getAllPeserta();

        $data = $peserta;

        foreach ($sawPeserta  as $key => $saw) {
            $data[$key]["nilaiSaw"] = $saw["nilaiAkhir"];
        }

        foreach ($topsisPeserta  as $key => $topsis) {
            $data[$key]["nilaiTopsis"] = $topsis["nilaiAkhir"];
        }

        usort($data, fn ($a, $b) => $b['nilaiTopsis'] <=> $a['nilaiTopsis']);

        return $data;
    }
}
