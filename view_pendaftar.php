<?php
// 1. Koneksi
require "./process/koneksi.php";

// 2. Tangkap ID dari URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}
$id = $_GET['id']; // biar aman, pastikan angka

// 3. Query ambil data dari database
$query = "SELECT * FROM pendaftar WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// 4. Control Handling
if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data dengan ID $id tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styleTugas3.css" rel="stylesheet">
</head>
<body>
    <nav>
        <a id="utama" href="index.php">Kabar Kampus</a>
        <a href="form.php"><button type="button" class="btn btn-success">Form Registrasi</button></a>
    </nav>

    <div class="viewData">
        <div class="dataCard">
            <h4>Data Pendaftar</h4>
            <p><?= "ID: " . $data['id'] ?></p>
            <p><?= "Nama: " . $data['nama'] ?></p>
            <p><?= "Email: " . $data['email'] ?></p>
            <p><?= "Nomor Telepon: " . $data['no_hp'] ?></p>
            <p><?= "Password: " . $data['password'] ?></p>
            <p><?= "Jurusan: " . $data['jurusan'] ?></p>
            <p><?= "Minat: " . $data['minat_topik'] ?></p>
            <p><?= "Gender: " . $data['gender'] ?></p>
            <p><?= "Alasan: " . $data['alasan'] ?></p>
        </div>     

        <div class="dashboardButton">
            <a href="index.php"><button type="button" class="btn btn-dark">Kembali ke Dashboard</button></a>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
</body>
</html>
