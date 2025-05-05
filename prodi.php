<?php
include "koneksi.php";

$query = "SELECT * FROM prodi";
$data = ambildata($query);


include "template/header.php";
include "template/sidebar.php"
?>


<div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Data Prodi</h3>
                </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
</head>
<body>
    <h1>Data Prodi</h1>
  
        <thead>
            <th>no</th>
            <th>nama</th>
            <th>kaprodi</th>
            <th>jurusan</th>
        </thead>
        <tbody>
            <?php
            $i=1; 
            foreach($data as $d) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $d["nama"] ?></td>
                <td><?php echo $d["kaprodi"] ?></td>
                <td><?php echo $d["jurusan"] ?></td>
            </tr>
                <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->

 
    

<?php
include "template/footer.php";
?>