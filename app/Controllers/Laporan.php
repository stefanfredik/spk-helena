<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Moora;
use App\Libraries\SawLib;
use App\Libraries\TopsisLib;
use App\Models\KriteriaModel;
use App\Models\KuotaModel;
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
        $this->kuotaModel = new KuotaModel();

        $peserta = $this->pesertaModel->findAllPeserta();
        $kriteria = $this->kriteriaModel->findAll();
        $subkriteria = $this->subkriteriaModel->findAll();

        $saw = new SawLib($peserta, $kriteria, $subkriteria);
        $topsis = new TopsisLib($peserta, $kriteria, $subkriteria);

        $saw->setRangking();

        $sawPeserta = $saw->getAllPeserta();
        $topsisPeserta = $topsis->getAllPeserta();

        $dataKuota = $this->kuotaModel->findAll();

        $data = $this->statusKeputusan($sawPeserta, $dataKuota);

        foreach ($sawPeserta  as $key => $saw) {
            $data[$key]["nilaiSaw"] = $saw["nilaiAkhir"];
        }

        foreach ($topsisPeserta  as $key => $topsis) {
            $data[$key]["nilaiTopsis"] = $topsis["nilaiAkhir"];
        }

        usort($data, fn ($a, $b) => $b['nilaiTopsis'] <=> $a['nilaiTopsis']);

        return $data;
    }

    private function statusKeputusan($dataPeserta, $dataKuota)
    {
        // hitung kuota tahunan
        $kuotaTahun = [];
        foreach ($dataKuota as $row) {
            $tahun = $row['tahun'];
            $jumlahKuota = $row['jumlah_kuota'];

            if (isset($kuotaTahun[$tahun])) {
                $kuotaTahun[$tahun] += $jumlahKuota;
            } else {
                $kuotaTahun[$tahun] = $jumlahKuota;
            }
        }


        foreach ($dataPeserta as $key => $ps) {
            $tahun = $ps['tahun'];
            $rangking = $ps['rangking'];
            $kuotaPeriode = 0;

            foreach ($dataKuota as $ku) {
                if ($tahun == $ku['tahun'] && $rangking <= $kuotaTahun[$tahun]) {
                    $kuotaPeriode += $ku['jumlah_kuota'];

                    $dataPeserta[$key]['status'] = 'Mendapatkan Bantuan';
                    if ($rangking <= $kuotaPeriode) {
                        $dataPeserta[$key]['periode'] = $ku['periode'];
                        $dataPeserta[$key]['tanggalTerima'] = $ku['tanggal_terima'];
                        break;
                    }
                } else {
                    $dataPeserta[$key]['periode'] = 'Tidak Tersedia';
                    $dataPeserta[$key]['tanggalTerima'] = 'Tidak Tersedia';
                    $dataPeserta[$key]['status'] = 'Tidak Mendapatkan Bantuan';
                }
            }
        }

        return $dataPeserta;
    }
}
