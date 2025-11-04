<?php
// TO DO
// 1. Require Koneksi
require "koneksi.php";

// 2. Tangkap Data baru dan Lama
$id = $_GET['id'];


// 3. Query Update 
$query = "DELETE FROM pendaftar WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// 4. Control Handling
if ($result) {
    header("Location:../index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>
