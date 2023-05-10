<?php

namespace App\Libraries;

use PhpParser\Node\Expr\Cast\Array_;

class SawLib
{
    private $dataAkhir = [];
    public $bobotKriteria = [];
    public $pesertaKriteria = [];

    public function __construct(private array $dataPeserta, private array $dataKriteria, private array $dataSubkriteria)
    {
        $this->setDataInfo();
        $this->hitungBobotKriteria();
        $this->setNilai();
        $this->normalisasi();
        $this->hitungNilaiAkhir();
        // $this->sortPeserta();
    }

    // Hitung bobot kriteria
    private function hitungBobotKriteria()
    {
        $totalNilaiKriteria = 0;

        foreach ($this->dataKriteria as $dk) {
            $totalNilaiKriteria += $dk['nilai'];
        }

        foreach ($this->dataKriteria as $dk) {
            $this->bobotKriteria[$dk['keterangan']] = number_format(($dk["nilai"] / $totalNilaiKriteria), 2);
        }
    }


    private function setDataInfo()
    {
        foreach ($this->dataPeserta as $key => $ps) {
            $this->dataAkhir[$key] = $ps;
        }
    }

    private function setNilai()
    {
        foreach ($this->dataPeserta as $key => $ps) {
            foreach ($this->dataKriteria as $dk) {
                $k = 'k_' . $dk['id'];

                foreach ($this->dataSubkriteria as $ds) {
                    if ($ps[$k] == $ds["id"]) {
                        $this->dataAkhir[$key]["kriteria_nilai"][$dk["keterangan"]] = $ds['nilai'];
                        $this->dataAkhir[$key]["kriteria_keterangan"][$dk["keterangan"]] = $ds['subkriteria'];
                    } else if ($ps[$k] == null) {
                        $this->dataAkhir[$key]["kriteria_nilai"][$dk["keterangan"]] = 0;
                        $this->dataAkhir[$key]["kriteria_keterangan"][$dk["keterangan"]] = 0;
                    }
                }
            }
        }
    }

    private function normalisasi()
    {
        $kriteria = [];

        // menampung nilai kriteria dari setiap peserta
        foreach ($this->dataKriteria as $dk) {
            $kriteria[$dk["keterangan"]] = [];

            foreach ($this->dataAkhir as $key =>  $da) {
                array_push($kriteria[$dk["keterangan"]], $da["kriteria_nilai"][$dk["keterangan"]]);
            }
        }

        // dd($kriteria);


        // foreach ($this->dataKriteria as $dk) {
        //     $kriteria[$dk["keterangan"]] = [];

        //     foreach ($this->dataAkhir as $key =>  $da) {
        //         array_push($kriteria[$dk["keterangan"]], $da["kriteria_nilai"][$dk["keterangan"]]);
        //     }
        // }

        // foreach ($this->dataAkhir as $key => $da) {
        //     foreach ($this->dataKriteria as $dk) {

        //         // $this->pesertaKriteria[$dk["keterangan"]] = $da["kriteria_nilai"][$dk["keterangan"]] / max($kriteria[$dk["keterangan"]]);
        //     }
        // }



        // hitung normalisasi
        foreach ($this->dataAkhir as $key => $da) {
            foreach ($this->dataKriteria as $dk) {
                $this->dataAkhir[$key]["normalisasi"][$dk["keterangan"]] = number_format($da["kriteria_nilai"][$dk["keterangan"]] / max($kriteria[$dk["keterangan"]]), 2);
            }
        }
    }


    private function hitungNilaiAkhir()
    {
        foreach ($this->dataAkhir as $key => $da) {
            $temp = 0;
            foreach ($this->dataKriteria as $i => $dk) {
                $temp += ($this->bobotKriteria[$dk["keterangan"]]) * $da["normalisasi"][$dk["keterangan"]];
            }

            $this->dataAkhir[$key]["nilaiAkhir"] =  number_format($temp, 3);
        }
    }

    public function sortPeserta()
    {
        usort($this->dataAkhir, fn ($a, $b) => $b['nilaiAkhir'] <=> $a['nilaiAkhir']);
        return $this;
    }

    public function setRangking()
    {
        foreach ($this->dataAkhir as $key => $da) {
            $this->dataAkhir[$key]['rangking'] = $key + 1;
            $this->dataAkhir[$key]['periode'] = "";
        }
    }



    public function getAllPeserta()
    {
        return $this->dataAkhir;
    }
}
