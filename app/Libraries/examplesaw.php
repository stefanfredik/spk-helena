<?php


// data alternatif dan kriteria
$alternatives = array(
    array('id' => 'A1', 'price' => 25000, 'quality' => 8, 'distance' => 10),
    array('id' => 'A2', 'price' => 22000, 'quality' => 7, 'distance' => 15),
    array('id' => 'A3', 'price' => 24000, 'quality' => 9, 'distance' => 5),
);

$criteria = array('price', 'quality', 'distance');

// bobot kriteria
$weights = array(0.4, 0.3, 0.3);

// inisialisasi objek Saw
$saw = new Saw($alternatives, $criteria, $weights);

// hitung nilai Si dari semua alt   ernatif
$results = $saw->calculate();

// tampilkan hasil
foreach ($results as $result) {
    $alternative = $result['alternative'];
    $si = $result['si'];
    echo $alternative['id'] . ': ' . $si . '<br>';
}



// hitung bobot kriteria

// inisialisasi data
$alternatives = array(
    array(
        'id' => 'A1',
        'preferences' => array(4, 6, 5),
    ),
    array(
        'id' => 'A2',
        'preferences' => array(6, 4, 3),
    ),
    array(
        'id' => 'A3',
        'preferences' => array(5, 5, 4),
    ),
);

$criteria = array(
    'price',
    'quality',
    'distance',
);

$criteriaWeight = array(
    3,
    5,
    4,
);

// inisialisasi objek Saw
$saw = new Saw($alternatives, $criteria, $criteriaWeight);

// hitung bobot kriteria
$weights = $saw->calculateWeight();

// tampilkan bobot kriteria
echo "Bobot Kriteria: \n";
foreach ($criteria as $key => $criterion) {
    echo $criterion . ': ' . round($weights[$key], 2) . "\n";
}
