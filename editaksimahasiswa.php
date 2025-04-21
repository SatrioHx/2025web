<?php
include "koneksi.php";

$nim = $_POST["nim"];
$nama = $_POST["nama"];
$tgl_lahir = $_POST["tgl_lahir"];
$no_telp = $_POST["telp"];
$email = $_POST["email"];
$id_prodi = $_POST["id_prodi"];


$query = "UPDATE mahasiswa SET nama = '$nama', tgl_lahir = '$tgl_lahir', no_telp = '$no_telp', email = '$email', id_prodi = '$id_prodi' WHERE nim = '$nim'";

mysqli_query($conn, $query);

header("location:index.php");
?>