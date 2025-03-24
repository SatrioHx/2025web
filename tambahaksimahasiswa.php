<?php
include "koneksi.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tgl_lahir = $_POST["tgl_lahir"];
$no_telp = $_POST["telp"];
$email = $_POST["email"];
$id_prodi = $_POST["id_prodi"];


$query = "INSERT INTO mahasiswa (nim, nama, tgl_lahir, no_telp, email, id_prodi) VALUES ('$nim', 
'$nama', '$tgl_lahir', '$no_telp', '$email', '$id_prodi')";

mysqli_query($conn, $query);

header("location:index.php");
?>