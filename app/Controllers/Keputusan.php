<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Libraries\SawLib;
use App\Libraries\TopsisLib;
use App\Models\KelayakanModel;
use App\Models\KriteriaModel;
use App\Models\PesertaModel;
use App\Models\SiswaModel;
use App\Models\SubkriteriaModel;

class Keputusan extends BaseController
{
    var $meta = [
        'url' => 'keputusan',
        'title' => 'Data Keputusan',
        'subtitle' => 'Halaman Keputusan'
    ];

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->siswaModel = new SiswaModel();
        $this->subkriteriaModel = new SubkriteriaModel();
        $this->pesertaModel = new PesertaModel();
        $this->kelayakanModel = new KelayakanModel();
        // $this->jumlahKriteria = $this->kriteriaModel > countAllResults();
        // $this->keputusanModel = new KeputusanBltModel();
    }

    public function index()
    {
        $kriteria       = $this->kriteriaModel->findAll();
        $subkriteria    = $this->subkriteriaModel->findAll();
        $peserta        = $this->pesertaModel->findAllPeserta();
        $kelayakan      = $this->kelayakanModel->findAll();

        helper('Check');
        $check = checkdata($peserta, $kriteria, $subkriteria, $kelayakan);
        if ($check) return view('/error/index', ['title' => 'Error', 'listError' => $check]);

        $saw = new SawLib($peserta, $kriteria, $subkriteria);
        $topsis = new TopsisLib($peserta, $kriteria, $subkriteria);

        $saw->sortPeserta();
        $topsis->sortPeserta();



        $data = [
            'title'         => 'Data Perhitungan dan Table Moora',
            'url'           => $this->meta['url'],
            'sawPeserta'       => $saw->getAllPeserta(),
            'topsisPeserta'       => $topsis->getAllPeserta(),
            'kelayakan'     => $kelayakan
        ];

        // $peserta = [];

        // foreach ($data['peserta'] as $key => $ps) {
        //     $peserta[$key]['nama_lengkap'] = $ps['nama_lengkap'];
        //     $peserta[$key]['nisn'] = $ps['nisn'];
        //     $peserta[$key]['tempat_lahir'] = $ps['tempat_lahir'];
        //     $peserta[$key]['tanggal_lahir'] = $ps['tanggal_lahir'];
        //     $peserta[$key]['jenis_kelamin'] = $ps['jenis_kelamin'];
        //     $peserta[$key]['nilai'] = $ps['kriteria_nilai'];
        //     $peserta[$key]['status_layak'] = $ps['status_layak'];
        // }

        // $this->keputusanModel->truncate();
        // $this->keputusanModel->insertBatch($peserta);


        return view('/keputusan/index', $data);
    }
}
