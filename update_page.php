<?php
// 1. Koneksi
require "./process/koneksi.php";

// 2. Tangkap ID dari URL
if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}
$id = $_GET['id'];

// 3. Ambil data dari database
$query = "SELECT * FROM pendaftar WHERE id = $id";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data tidak ditemukan!");
}

$minat_tersimpan = explode(", ", $data["minat_topik"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pendaftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styleTugas3.css" rel="stylesheet">
</head>
<body>
    <nav>
        <a id="utama" href="index.php">Kabar Kampus</a>
        <a href="index.php"><button type="button" class="btn btn-danger">Kembali</button></a>
    </nav>

    <div class="form">
        <form action="./process/update_pendaftar.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <label class="judul">Update Data</label><hr>

            <div id="c">
                <div id="a">
                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                    <input name="nama" required class="form-control" type="text" id="namaLengkap" 
                        value="<?= $data['nama'] ?>">

                    <div class="mb-3">
                        <label for="noTelp" class="form-label mt-2">Nomor Telepon</label>
                        <input name="no_hp" required type="text" class="form-control" id="noTelp"
                            value="<?= $data['no_hp'] ?>">
                    </div>                     
                </div>

                <div id="b">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" required class="form-control" type="email" id="email" 
                        value="<?= $data['email'] ?>">

                    <div class="mb-3">
                        <label for="password" class="form-label mt-2">Password</label>
                        <input name="password" required type="password" class="form-control" id="password" 
                            value="<?= $data['password'] ?>">
                    </div>                                       
                </div>  
            </div>

            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" id="jurusan" required class="form-select">
                <option disabled>Pilih Jurusan ...</option>
                <option value="if" <?= $data['jurusan'] == 'Informatika' ? 'selected' : '' ?>>Informatika</option>
                <option value="si" <?= $data['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                <option value="ilkom" <?= $data['jurusan'] == 'Ilmu Komputer' ? 'selected' : '' ?>>Ilmu Komputer</option>
                <option value="ti" <?= $data['jurusan'] == 'Teknologi Informasi' ? 'selected' : '' ?>>Teknologi Informasi</option>
            </select>

            <label class="form-label mt-3">Minat Topik (Bisa pilih lebih dari satu)</label>
            <?php
            $opsi_minat = ["Event Kampus", "Teknologi", "Politik", "Musik"];
            foreach ($opsi_minat as $m) {
                $checked = in_array($m, $minat_tersimpan) ? 'checked' : '';
                echo "
                <div class='form-check'>
                    <input class='form-check-input' type='checkbox' name='minat_topik[]' value='$m' id='$m' $checked>
                    <label class='form-check-label' for='$m'>$m</label>
                </div>";
            }
            ?>

            <label class="form-label mt-3">Gender</label>
            <?php
            $genders = ["Laki-Laki", "Perempuan", "Lainnya"];
            foreach ($genders as $g) {
                $checked = ($data["gender"] == $g) ? "checked" : "";
                echo "
                <div class='form-check'>
                    <input required class='form-check-input' type='radio' name='gender' value='$g' id='$g' $checked>
                    <label class='form-check-label' for='$g'>$g</label>
                </div>";
            }
            ?>

            <div class="mb-3 mt-3">
                <label class="form-label">Alasan Bergabung</label>
                <textarea required class="form-control" name="alasan" rows="3"><?= $data['alasan'] ?></textarea>
            </div>

            <div id="d">
                <button type="submit" class="btn btn-primary" style="width: 80%;">Update Data</button>
                <button id="resetBtn" type="reset" class="btn btn-danger" style="width: 20%;">Reset</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script>
    document.getElementById("resetBtn").addEventListener("click", function() {
        if (confirm("Yakin mau hapus semua isian?")) {
            const form = this.closest("form");

            // Kosongkan semua input teks, password, email, textarea
            form.querySelectorAll("input[type='text'], input[type='password'], input[type='email'], textarea").forEach(el => {
                el.value = "";
            });

            // Uncheck semua checkbox dan radio
            form.querySelectorAll("input[type='checkbox'], input[type='radio']").forEach(el => {
                el.checked = false;
            });

            // Reset dropdown ke pilihan pertama
            form.querySelectorAll("select").forEach(el => {
                el.selectedIndex = 0;
            });
        }
    });
    </script>

</body>
</html>
