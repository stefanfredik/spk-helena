<?php

class Moora2 {
    private $criteria;
    private $alternatives;
    private $weights;

    public function __construct($criteria, $alternatives, $weights) {
        $this->criteria = $criteria;
        $this->alternatives = $alternatives;
        $this->weights = $weights;
        $this->criteriaMaxValues = array();
    }

    public function calculateScore() {
        $scores = array();
        foreach ($this->alternatives as $altKey => $alternative) {
            $positive = array();
            $negative = array();
            foreach ($this->criteria as $criKey => $criterion) {
                if ($criterion['type'] == 'benefit') {
                    $positive[] = $alternative[$criKey] * $this->weights[$criKey];
                } else {
                    $negative[] = $alternative[$criKey] * $this->weights[$criKey];
                }
            }
            $positiveSum = array_sum($positive);
            $negativeSum = array_sum($negative);
            $score = $positiveSum / $negativeSum;
            $scores[$altKey] = $score;
        }
        return $scores;
    }


    public function normalize() {
        $normalized = array();
        foreach ($this->criteria as $criKey => $criterion) {
            $values = array_column($this->alternatives, $criKey);
            $maxValue = max($values);
            $this->criteriaMaxValues[$criKey] = $maxValue;
        }
        foreach ($this->alternatives as $altKey => $alternative) {
            $normalized[$altKey] = array();
            foreach ($this->criteria as $criKey => $criterion) {
                $value = $alternative[$criKey] / $this->criteriaMaxValues[$criKey];
                $normalized[$altKey][] = $value;
            }
        }
        return $normalized;
    }
}


function calculateAdjustedWeights($weights) {
    $totalWeights = array_sum($weights);
    $adjustedWeights = array();

    foreach ($weights as $weight) {
        $adjustedWeight = $weight / $totalWeights;
        $adjustedWeights[] = $adjustedWeight;
    }

    return $adjustedWeights;
}


function calculateNormalization($alternatives) {
    $norms = array();
    foreach ($alternatives as $alternative) {
        $sum = 0;
        foreach ($alternative as $value) {
            $sum += pow($value, 2);
        }
        $norm = sqrt($sum);
        $norms[] = $norm;
    }
    return $norms;
}


// $kriteria = [
//     "Penghasilan Orang Tua",
//     "Tanggungan Orang Tua",
//     "Pekerjaan Orang Tua",
//     "Status Orang Tua",
//     "Yatim Piatu",
//     "Nilai Raport"
// ];

// $kriteria = [
//     "cost",
//     "benefit",
//     "cost",
//     "cost",
//     "benefit",
//     "benefit"
// ];

$criteria = array(
    array('name' => 'Penghasilan Orang Tua', 'type' => 'cost'),
    array('name' => 'Tanggungan Orang Tua', 'type' => 'benefit'),
    array('name' => 'Pekerjaan Orang Tua', 'type' => 'cost'),
    array('name' => 'Status Orang Tua', 'type' => 'cost'),
    array('name' => 'Yatim Piatu', 'type' => 'benefit'),
    array('name' => 'Nilai Rapor', 'type' => 'benefit')
);

$datasiswa = array(
    [1, 5, 4, 4, 1, 5],
    [4, 2, 4, 4, 1, 3],
    [2, 2, 2, 4, 3, 4],
    [1, 4, 4, 4, 1, 3],
    [3, 2, 4, 4, 1, 4],
    [5, 1, 4, 4, 1, 5],
);

// $weights = array(0.148, 0.185, 0.148, 0.148, 0.185, 0.185);

$weights = array(4, 5, 4, 4, 5, 5);

$moora = new MOORA($criteria, $datasiswa, $weights);
$scores = $moora->calculateScore();

$perbaikan = calculateAdjustedWeights($weights);

print_r($perbaikan);

echo "Hasil Perhitungan MOORA:\n";
foreach ($scores as $altKey => $score) {
    echo "Alternatif " . ($altKey + 1) . ": " . $score . "\n";
}


$normalized = $moora->normalize();

print_r($normalized);


// $norms = calculateNormalization($datasiswa);

// print_r($norms);
