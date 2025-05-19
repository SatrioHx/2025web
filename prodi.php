<?php
 
include "koneksi.php";

$query = "SELECT * FROM prodi";
$data = ambildata($query);


include "template/header.php";
include "template/sidebar.php"
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </div>
                <div class="app-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Prodi</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Kaprodi</th>
                                                    <th>Jurusan</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                foreach ($data as $d) : ?>
                                                    <tr>
                                                        <td> <?php echo $i++; ?> </td>
                                                        <td> <?php echo $d["nama"] ?> </td>
                                                        <td> <?php echo $d["kaprodi"] ?> </td>
                                                        <td> <?php echo $d["jurusan"] ?> </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
</main>
<!--end::App Main-->

<?php
include "template/footer.php";
?>