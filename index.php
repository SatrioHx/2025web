<?php
include "koneksi.php";

$query = "SELECT * FROM mahasiswa";
$data = ambildata($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <br>
    <a href="tambahmahasiswa.php">Tambah Data</a>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <th>no</th>
            <th>nim</th>
            <th>nama</th>
            <th>tgl_lahir</th>
            <th>no_telp</th>
            <th>email</th>
            <th>id_prodi</th>
        </thead>
        <tbody>
            <?php
            $i=1; 
            foreach($data as $d) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $d["nim"] ?></td>
                <td><?php echo $d["nama"] ?></td>
                <td><?php echo $d["tgl_lahir"] ?></td>
                <td><?php echo $d["no_telp"] ?></td>
                <td><?php echo $d["email"] ?></td>
                <td><?php echo $d["id_prodi"] ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</body>
</html>