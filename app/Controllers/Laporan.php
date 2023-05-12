<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\SawLib;
use App\Libraries\TopsisLib;
use App\Models\KriteriaModel;
use App\Models\KuotaModel;
use App\Models\PesertaModel;
use App\Models\SubkriteriaModel;
use Dompdf\Dompdf;

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
        $this->kuotaModel = new KuotaModel();
        $this->pesertaModel = new PesertaModel();
    }

    public function index()
    {
        $data = [
            'title' => $this->meta['title'],
            'dataKriteria' => $this->kriteriaModel->findAll(),
            'dataSubkriteria' => $this->subkriteriaModel->findAll(),
            'peserta' => $this->data()
        ];

        return view('/laporan/index', $data);
    }

    public function cetak()
    {
        $data['peserta'] = $this->data();
        $data["title"] = 'LAPORAN ' . APP_DESC;
        $this->pdf($data, "laporan/cetak");
    }

    private function data()
    {
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

    private function pdf(array $data, String $view)
    {
        $pdf = new Dompdf(array('DOMPDF_ENABLE_REMOTE' => true));

        $html = view($view, $data);
        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->stream();
    }
}
