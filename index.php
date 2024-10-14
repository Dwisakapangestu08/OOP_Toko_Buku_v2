<?php

include_once 'Connection/Database.php';
include_once 'Model/BukuModel.php';

$conn = new Database();
$db = $conn->connect();
$buku = new Buku($db);

$data = $buku->read();
$data = $data->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2>Toko Buku</h2>
            </div>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Buku</a></li>
                <li><a href="#">Pengguna</a></li>
                <li><a href="#">Pengaturan</a></li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="navbar-left">
                    <button id="menu-toggle">☰</button>
                </div>
                <div class="navbar-right">
                    <span>User</span>
                </div>
            </nav>

            <!-- Content Area -->
            <section class="content">
                <div class="content-header">
                    <h1>Data Buku</h1>
                    <button class="btn btn-primary">Tambah Buku</button>
                </div>

                <!-- Tabel Buku -->
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['judul_buku'] ?></td>
                                    <td><?= $row['pengarang'] ?></td>
                                    <td><?= $row['penerbit'] ?></td>
                                    <td>
                                        <button class="btn btn-warning">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>