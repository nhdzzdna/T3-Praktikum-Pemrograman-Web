<?php
// 1. Koneksi ke database
require "koneksi.php";

// 2. Tangkap data dari form edit
$id = $_POST["id"];
$nama = $_POST["nama"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];
$password = $_POST["password"];
$alasan = $_POST["alasan"];
$gender = $_POST["gender"];

// 3. Ubah value jurusan dari kode ke nama
switch($_POST["jurusan"]){
    case "if": $jurusan = "Informatika"; break;
    case "si": $jurusan = "Sistem Informasi"; break;
    case "ilkom": $jurusan = "Ilmu Komputer"; break;
    case "ti": $jurusan = "Teknologi Informasi"; break;
    default: $jurusan = "Tidak Diketahui"; break;
}

// 4. Gabungkan array minat jadi string
if(isset($_POST["minat_topik"])){
    $minat_topik = implode(", ", $_POST["minat_topik"]);
}else{
    $minat_topik = "-";
}

// 5. Query UPDATE
$query = "UPDATE pendaftar SET nama='$nama', no_hp='$no_hp', email='$email', password='$password', jurusan='$jurusan', minat_topik='$minat_topik', gender='$gender', alasan='$alasan' WHERE id=$id";

// 6. Eksekusi dan kontrol hasil
if(mysqli_query($koneksi, $query)){
    echo("<script>
            alert('Data berhasil diperbarui!');
            window.location.href='../index.php';
          </script>");
} else{
    echo("Gagal memperbarui data: ".mysqli_error($koneksi));
}
?>
