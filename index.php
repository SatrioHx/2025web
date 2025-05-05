<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.html");
}

include "koneksi.php";

$query = "SELECT mahasiswa.*, prodi.nama AS NamaProdi
        FROM mahasiswa
        LEFT JOIN prodi ON mahasiswa.id_prodi = prodi.id";
$data = ambildata($query);

include "template/header.php";
include "template/sidebar.php"
?>

<div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Data Mahasiswa</h3>
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                         
                          <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>ID Prodi</th>
                    <th>Nama Prodi</th>
                    <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                    
                      <?php $i = 1; foreach($data as $d): ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $d["nim"]; ?></td>
                    <td><?= $d["nama"]; ?></td>
                    <td><?= $d["tgl_lahir"]; ?></td>
                    <td><?= $d["no_telp"]; ?></td>
                    <td><?= $d["email"]; ?></td>
                    <td><?= $d["id_prodi"]; ?></td>
                    <td><?= $d["NamaProdi"]; ?></td>
                    <td><a href="deletemahasiswa.php?nim=<?= $d["nim"]; ?>"
                             onclick="return confirm ('Yakin ingin hapus?')" class="btn btn-danger">Delete</a>
                        <a href="editmahasiswa.php?nim=<?= $d["nim"]; ?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->

 
    

<?php
include "template/footer.php";
?>