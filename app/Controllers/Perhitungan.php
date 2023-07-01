<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\SiswaModel;
use App\Models\SubkriteriaModel;
use App\Libraries\SawLib;
use App\Libraries\TopsisLib;

class Perhitungan extends BaseController {
    var $meta = [
        'url' => 'datasiswa',
        'title' => 'Data Siswa',
        'subtitle' => 'Halaman Siswa'
    ];

    private $totalNilaiKriteria;

    public function __construct() {
        $this->kriteriaModel = new KriteriaModel();
        $this->siswaModel = new SiswaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();
        // $this->kelayakanModel = new KelayakanModel();

        $this->jumlahKriteria = $this->kriteriaModel->countAllResults();
    }


    public function index() {
        $kriteria       = $this->kriteriaModel->findAll();
        $subkriteria    = $this->subkriteriaModel->findAll();
        $peserta        = $this->pesertaModel->findAllPeserta();
        // $kelayakan      = $this->kelayakanModel->findAll();

        helper('Check');

        $check = checkdata($peserta, $kriteria, $subkriteria);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        // $moora = new Moora($peserta, $kriteria, $subkriteria, $kelayakan);
        // $moora = new Moora($peserta, $kriteria, $subkriteria);
        $saw = new SawLib($peserta, $kriteria, $subkriteria);
        $topsis = new TopsisLib($peserta, $kriteria, $subkriteria);


        // dd($peserta);
        // dd($topsis);

        $data = [
            'title' => 'Data Perhitungan dan Table Moora',
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'sawPeserta' => $saw->getAllPeserta(),
            'topsisPeserta' => $topsis->getAllPeserta(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'bobotKriteria' => $saw->bobotKriteria,
            'topsisAplus' => $topsis->aPlus,
            'topsisAminus' => $topsis->aMinus
        ];

        return view('/perhitungan/index', $data);
    }
}
