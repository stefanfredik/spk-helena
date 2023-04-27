<?php

class Saw {

    // data alternatif dan kriteria
    private $alternatives;
    private $criteria;

    // bobot kriteria
    private $criteriaWeight;

    // konstruktor
    function __construct($alternatives, $criteria, $weights) {
        $this->alternatives = $alternatives;
        $this->criteria = $criteria;
        $this->criteriaWeight = $criteriaWeight;
    }

    // fungsi untuk menghitung bobot kriteria
    public function calculateWeight() {
        // inisialisasi array untuk menyimpan bobot kriteria
        $weights = array();

        // loop untuk setiap kriteria
        foreach ($this->criteria as $key => $criterion) {
            // hitung total nilai preferensi pada kriteria tersebut
            $totalPreference = 0;
            foreach ($this->alternatives as $alternative) {
                $totalPreference += $alternative['preferences'][$key];
            }

            // hitung bobot kriteria dengan memperhitungkan tingkat kepentingan
            $criterionWeight = $this->criteriaWeight[$key];
            $weight = $criterionWeight / $totalPreference;

            // simpan bobot kriteria pada array
            $weights[] = $weight;
        }

        // normalisasi bobot kriteria
        $totalWeight = array_sum($weights);
        foreach ($weights as &$weight) {
            $weight = $weight / $totalWeight;
        }

        // kembalikan array berisi bobot kriteria
        return $weights;
    }


    // method untuk menghitung nilai normalisasi
    private function normalize($x, $min, $max) {
        return ($x - $min) / ($max - $min);
    }

    // method untuk menghitung nilai Si
    private function calculateSi($alternative) {
        $si = 0;
        foreach ($this->criteria as $key => $criterion) {
            $criterionValues = array_column($this->alternatives, $criterion);
            $criterionMin = min($criterionValues);
            $criterionMax = max($criterionValues);
            $si += $this->weights[$key] * $this->normalize($alternative[$criterion], $criterionMin, $criterionMax);
        }
        return $si;
    }

    // method untuk menghitung nilai Si dari semua alternatif
    public function calculate() {
        $results = array();
        foreach ($this->alternatives as $key => $alternative) {
            $si = $this->calculateSi($alternative);
            $results[$key] = array('alternative' => $alternative, 'si' => $si);
        }
        usort($results, function ($a, $b) {
            return $b['si'] <=> $a['si'];
        });
        return $results;
    }
}
