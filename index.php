<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Luas dan Volume</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Selamat Datang di Aplikasi Penghitungan Luas dan Volume</h1>
    <form action="calculate.php" method="POST">
        <!-- form pengisian biodata -->
        <fieldset>
            <legend>Biodata Siswa</legend>
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>

            <label for="school">Nama Sekolah:</label>
            <input type="text" id="school" name="school" required>

            <label for="age">Usia:</label>
            <input type="number" id="age" name="age" required>

            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="number" id="phone" name="phone" required>
        </fieldset>
        <!-- form pengisian perhitungan -->
        <fieldset>
            <legend>Pilih Penghitungan</legend>
            <label for="type">Jenis Penghitungan:</label>
            <select name="type" id="type" required onchange="showForm()">
                <option value="">Pilih Jenis Penghitungan</option>
                <option value="luas">Luas Bangun Datar</option>
                <option value="volume">Volume Bangun Ruang</option>
            </select>

            <label for="shape">Bangun yang Dipilih:</label>
            <select name="shape" id="shape" required></select>
        </fieldset>

        <!-- Form input yang akan ditampilkan berdasarkan bangun -->
        <div id="persegi" class="form-input">
            <label for="side">Sisi Persegi:</label>
            <input type="number" id="side" name="side">
            <value>
        </div>

        <div id="segitiga" class="form-input">
            <label for="base">Alas Segitiga:</label>
            <input type="number" id="base" name="base">
            <label for="height">Tinggi Segitiga:</label>
            <input type="number" id="height" name="height">
        </div>

        <div id="lingkaran" class="form-input">
            <label for="radius">Radius Lingkaran:</label>
            <input type="number" id="radius" name="radius">
        </div>

        <div id="kubus" class="form-input">
            <label for="side_kubus">Sisi Kubus:</label>
            <input type="number" id="side_kubus" name="side_kubus">
        </div>

        <div id="limas" class="form-input">
            <label for="base_limas">Alas Limas:</label>
            <input type="number" id="base_limas" name="base_limas">
            <label for="height_limas">Tinggi Limas:</label>
            <input type="number" id="height_limas" name="height_limas">
        </div>

        <div id="tabung" class="form-input">
            <label for="radius_tabung">Radius Tabung:</label>
            <input type="number" id="radius_tabung" name="radius_tabung">
            <label for="height_tabung">Tinggi Tabung:</label>
            <input type="number" id="height_tabung" name="height_tabung">
        </div>

        <button type="submit">Hitung</button>
    </form>
    <!-- tombol untuk melihat data dan statistik-->
    <a href="dashboard.php">Lihat Data dan Statistik</a>
    
    <!-- script untuk  menampilkan form input berdasarkan bangun yang dipilih -->
    <script>
        function showForm() {
            const type = document.getElementById('type').value;
            const shapeSelect = document.getElementById('shape');
            const formInputs = document.querySelectorAll('.form-input');
            
            formInputs.forEach(input => input.style.display = 'none');
            shapeSelect.innerHTML = '';

            if (type === 'luas') {
                shapeSelect.innerHTML += '<option value="persegi">Persegi</option>';
                shapeSelect.innerHTML += '<option value="segitiga">Segitiga</option>';
                shapeSelect.innerHTML += '<option value="lingkaran">Lingkaran</option>';
            } else if (type === 'volume') {
                shapeSelect.innerHTML += '<option value="kubus">Kubus</option>';
                shapeSelect.innerHTML += '<option value="limas">Limas</option>';
                shapeSelect.innerHTML += '<option value="tabung">Tabung</option>';
            }

            shapeSelect.addEventListener('change', function() {
                const shape = shapeSelect.value;
                formInputs.forEach(input => input.style.display = 'none');
                document.getElementById(shape).style.display = 'block';
            });
        }
    </script>
    <footer>
        <p>&copy; Bariq Adyatma</p>
    </footer>
</body>
</html>
