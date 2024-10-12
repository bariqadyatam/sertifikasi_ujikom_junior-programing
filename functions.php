<?php

// Fungsi untuk menyimpan data ke CSV
function saveToCSV($filename, $data) {
    $file = fopen($filename, 'a');
    fputcsv($file, $data);
    fclose($file);
}

// Fungsi untuk membaca data dari CSV
function readCSV($filename) {
    $file = fopen($filename, 'r');
    $data = [];
    while (($row = fgetcsv($file)) !== FALSE) {
        $data[] = $row;
    }
    fclose($file);
    return $data;
}

// Fungsi untuk menghitung persentase setiap bangun
function calculateShapePercentage($data) {
    $shapeCount = [
        'persegi' => 0,
        'segitiga' => 0,
        'lingkaran' => 0,
        'kubus' => 0,
        'limas' => 0,
        'tabung' => 0
    ];
    foreach ($data as $row) {
        $shape = $row[6]; // Kolom bangun
        $shapeCount[$shape]++;
    }

    $total = array_sum($shapeCount);
    foreach ($shapeCount as $shape => $count) {
        $shapeCount[$shape] = round(($count / $total) * 100, 2);
    }
    return $shapeCount;
}

?>
