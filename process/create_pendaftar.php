<?php

//1. Require koneksi PHP
require "./koneksi.php";

//2. Tangkap data
$nama = $_POST["nama"];
$no_hp = $_POST["no_hp"];
$email = $_POST["email"];
$password = $_POST["password"];
$alasan = $_POST["alasan"];
$gender = $_POST["gender"];

switch($_POST["jurusan"]){
    case "if": $jurusan = "Informatika"; break;
    case "si": $jurusan = "Sistem Informasi"; break;
    case "ilkom": $jurusan = "Ilmu Komputer"; break;
    case "ti": $jurusan = "Teknologi Informasi"; break;
    default: $jurusan = "Tidak Diketahui"; break;
}

if(isset($_POST["minat_topik"])){
    $minat_topik = implode(", ", $_POST["minat_topik"]);
} else {
    $minat_topik = "-";
}

//3. Query (tambahkan created_at)
$query = "INSERT INTO pendaftar (nama, no_hp, email, password, jurusan, minat_topik, gender, alasan, created_at) VALUES ('$nama', '$no_hp', '$email', '$password', '$jurusan', '$minat_topik', '$gender', '$alasan', NOW())";

//4. Control handling
if (mysqli_query($koneksi, $query)) {
    header("Location: ../index.php");
    exit;
} else {
    echo "Query gagal!<br>";
    echo "Error MySQL: " . mysqli_error($koneksi) . "<br>";
    echo "Query: " . $query;
}

