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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <style>
        /* Reset dasar */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #0d0d0d;
            color: #fff;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #b388ff;
            text-shadow: 0 0 10px #b388ff;
            margin-bottom: 30px;
        }

        .table-container {
            width: 100%;
            background: #1a1a1a;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(179, 136, 255, 0.3);
            overflow-x: auto;
        }

        a.button {
            background: #9b59b6;
            color: #fff;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            box-shadow: 0 0 8px #9b59b6;
            transition: 0.3s;
        }

        a.button:hover {
            background: #7a42f4;
            box-shadow: 0 0 15px #b388ff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 14px 20px;
            border: 1px solid #333;
            text-align: left;
        }

        th {
            background: #2e0854;
            color: #fff;
            text-shadow: 0 0 5px #b388ff;
        }

        tr:nth-child(even) {
            background: #1f1f1f;
        }

        .action-links {
            display: flex;
            gap: 10px;
        }

        .action-links a {
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
            box-shadow: 0 0 8px rgba(179, 136, 255, 0.2);
        }

        .action-links a.edit {
            background-color: #6c5ce7;
        }

        .action-links a.edit:hover {
            background-color: #a29bfe;
            box-shadow: 0 0 12px #a29bfe;
        }

        .action-links a.delete {
            background-color: #d63031;
        }

        .action-links a.delete:hover {
            background-color: #ff7675;
            box-shadow: 0 0 12px #ff7675;
        }

        @media (max-width: 768px) {
            .action-links {
                flex-direction: column;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            td {
                position: relative;
                padding-left: 50%;
                border: none;
                border-bottom: 1px solid #333;
            }

            td::before {
                position: absolute;
                top: 14px;
                left: 14px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                color: #b388ff;
            }

            td:nth-of-type(1)::before { content: "No"; }
            td:nth-of-type(2)::before { content: "NIM"; }
            td:nth-of-type(3)::before { content: "Nama"; }
            td:nth-of-type(4)::before { content: "Tanggal Lahir"; }
            td:nth-of-type(5)::before { content: "No. Telp"; }
            td:nth-of-type(6)::before { content: "Email"; }
            td:nth-of-type(7)::before { content: "ID Prodi"; }
            td:nth-of-type(8)::before { content: "Nama Prodi"; }
            td:nth-of-type(9)::before { content: "Aksi"; }
        }
    </style>
</head>
<body>

    <div class="table-container">
        <h1>Data Mahasiswa</h1>
        <a class="button" href="tambahmahasiswa.php">+ Tambah Data</a>
        <table>
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
                    <td>
                        <div class="action-links">
                            <a class="edit" href="editmahasiswa.php?nim=<?= $d['nim']; ?>">Edit</a>
                            <a class="delete" href="deletemahasiswa.php?nim=<?= $d['nim']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="logout.php">keluar</a>
    </div>

</body>
</html>
