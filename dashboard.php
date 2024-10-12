<?php
include 'functions.php';

// Baca data dari CSV
$data = readCSV('data/data.csv');

// Hitung statistik
$totalCalculations = count($data);
$shapesCount = calculateShapePercentage($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data dan Statistik</title>
    <link rel="stylesheet" href="css/styles2.css">
    <style>
        th {
            cursor: pointer;
        }
    </style>
    <script>
        // Fungsi untuk sorting tabel
        function sortTable(n) {
            let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.querySelector("table");
            switching = true;
            // Set sorting direction ke ascending
            dir = "asc"; 
            
            while (switching) {
                switching = false;
                rows = table.rows;
                
                // Loop melalui semua baris kecuali header
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
</head>
<body>
    <h1>Dashboard Data dan Statistik</h1>

    <h2>Data Siswa dan Hasil Perhitungan</h2>
    <table>
        <thead>
            <tr>
                <th onclick="sortTable(0)">Tanggal dan Waktu</th>
                <th onclick="sortTable(1)">Nama</th>
                <th onclick="sortTable(2)">Sekolah</th>
                <th onclick="sortTable(3)">Usia</th>
                <th onclick="sortTable(4)">Alamat</th>
                <th onclick="sortTable(5)">Telepon</th>
                <th onclick="sortTable(6)">Bangun</th>
                <th onclick="sortTable(7)">Hasil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
            <tr>
                <?php foreach ($row as $item): ?>
                <td><?php echo htmlspecialchars($item); ?></td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Statistik</h2>
    <p>Total Penghitungan: <?php echo $totalCalculations; ?></p>
    <p>Persentase per Bangun:</p>
    <ul>
        <?php foreach ($shapesCount as $shape => $percentage): ?>
        <li><?php echo htmlspecialchars($shape) . ": " . number_format($percentage, 2) . "%"; ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="index.php">Kembali ke Halaman Utama</a>
    <footer>
        <p>&copy; Bariq Adyatma</p>
    </footer>
</body>
</html>
