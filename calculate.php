<?php
include 'functions.php';

// Set zona waktu ke Jakarta
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil biodata siswa
    $name = $_POST['name'];
    $school = $_POST['school'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Ambil pilihan perhitungan dan bangun
    $type = $_POST['type'];
    $shape = $_POST['shape'];

    // Lakukan perhitungan berdasarkan jenis bangun
    switch ($shape) {
        case 'persegi':
            $side = $_POST['side'];
            $result = $side * $side;  // Luas persegi
            break;
        case 'segitiga':
            $base = $_POST['base'];
            $height = $_POST['height'];
            $result = 0.5 * $base * $height;  // Luas segitiga
            break;
        case 'lingkaran':
            $radius = $_POST['radius'];
            $result = 3.14 * $radius * $radius;  // Luas lingkaran
            break;
        case 'kubus':
            $side_kubus = $_POST['side_kubus'];
            $result = $side_kubus * $side_kubus * $side_kubus;  // Volume kubus
            break;
        case 'limas':
            $base_limas = $_POST['base_limas'];
            $height_limas = $_POST['height_limas'];
            $result = (1/3) * $base_limas * $base_limas * $height_limas;  // Volume limas
            break;
        case 'tabung':
            $radius_tabung = $_POST['radius_tabung'];
            $height_tabung = $_POST['height_tabung'];
            $result = 3.14 * $radius_tabung * $radius_tabung * $height_tabung;  // Volume tabung
            break;
        default:
            $result = 0;
    }

    // Simpan hasil perhitungan dan biodata ke file CSV
    $date = date('Y-m-d H:i:s');
    $data = [$date, $name, $school, $age, $address, $phone, $shape, $result];
    saveToCSV('data/data.csv', $data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Hasil Perhitungan</h1>
    <p><?php echo "Hasil penghitungan $shape: $result"; ?></p>
    <a href="index.php">Kembali ke Halaman Utama</a>
</body>
</html>
