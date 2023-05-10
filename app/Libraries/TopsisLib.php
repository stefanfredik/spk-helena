<?php

namespace App\Libraries;

class TopsisLib
{
    private $dataAkhir = [];
    public $bobotKriteria = [];
    public $aPlus = [];
    public $aMinus = [];



    public function __construct(private array $dataPeserta, private array $dataKriteria, private array $dataSubkriteria)
    {
        $this->setDataInfo();
        $this->hitungBobotKriteria();
        $this->setNilai();
        $this->normalisasi();
        $this->hitungNormalisasiTerbobot();
        $this->hitungAplus();
        $this->hitungAMinus();
        $this->hitungSolusiIdealPositive();
        $this->hitungSolusiIdealNegative();
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
        // hitung normalisasi
        foreach ($this->dataAkhir as $key => $da) {
            foreach ($this->dataKriteria as $dk) {
                $this->dataAkhir[$key]["normalisasi"][$dk["keterangan"]] = $this->hitungNormalisasi($da["kriteria_nilai"][$dk["keterangan"]], $kriteria[$dk["keterangan"]]);
            }
        }
    }



    private function hitungNormalisasiTerbobot()
    {
        foreach ($this->dataAkhir as $key =>  $da) {
            foreach ($this->dataKriteria as $dk) {
                $this->dataAkhir[$key]["normalisasiTerbobot"][$dk["keterangan"]] =  $this->bobotKriteria[$dk["keterangan"]] * $da['normalisasi'][$dk["keterangan"]];
            }
        }
    }

    private function hitungAplus()
    {
        foreach ($this->dataKriteria as $dk) {
            $tempMax[$dk["keterangan"]] = [];

            foreach ($this->dataAkhir as $key =>  $da) {
                array_push($tempMax[$dk["keterangan"]], $da['normalisasiTerbobot'][$dk["keterangan"]]);
            }

            $this->aPlus[$dk["keterangan"]] = max($tempMax[$dk["keterangan"]]);
        }
    }

    private function hitungAminus()
    {
        foreach ($this->dataKriteria as $dk) {
            $tempMax[$dk["keterangan"]] = [];

            foreach ($this->dataAkhir as $key =>  $da) {
                array_push($tempMax[$dk["keterangan"]], $da['normalisasiTerbobot'][$dk["keterangan"]]);
            }

            $this->aMinus[$dk["keterangan"]] = min($tempMax[$dk["keterangan"]]);
        }
    }


    private function hitungSolusiIdealPositive()
    {

        foreach ($this->dataAkhir as $key => $da) {
            $temp = 0;
            foreach ($this->dataKriteria as $dk) {
                $temp += pow($this->aPlus[$dk["keterangan"]] - $da['normalisasiTerbobot'][$dk["keterangan"]], 2);
            }

            $this->dataAkhir[$key]["idealPositive"] =  number_format(sqrt($temp), 3);
        }
    }


    private function hitungSolusiIdealNegative()
    {

        foreach ($this->dataAkhir as $key => $da) {
            $temp = 0;
            foreach ($this->dataKriteria as $dk) {
                $temp += pow($this->aMinus[$dk["keterangan"]] - $da['normalisasiTerbobot'][$dk["keterangan"]], 2);
            }

            $this->dataAkhir[$key]["idealNegative"] = number_format(sqrt($temp), 3);
        }
    }


    private function hitungNilaiAkhir()
    {
        foreach ($this->dataAkhir as $key => $da) {
            $this->dataAkhir[$key]['nilaiAkhir'] = number_format($da["idealNegative"] / ($da['idealNegative'] + $da['idealPositive']), 3);
        }
    }

    public function sortPeserta()
    {
        usort($this->dataAkhir, fn ($a, $b) => $b['nilaiAkhir'] <=> $a['nilaiAkhir']);
        return $this;
    }


    public function getAllPeserta()
    {
        return $this->dataAkhir;
    }

    public function setRangking()
    {
        foreach ($this->dataAkhir as $key => $da) {
            $this->dataAkhir[$key]['rangking'] = $key + 1;
            $this->dataAkhir[$key]['periode'] = "";
        }
    }



    // helper function
    private function hitungNormalisasi(float $bobot, array $semuabobot): float
    {
        $nilai = 0;
        if ($bobot == 0) {
            return 0;
        }

        foreach ($semuabobot as $arr) {
            $nilai += pow($arr, 2);
        }

        return number_format($bobot / sqrt($nilai), 2);
    }
}
