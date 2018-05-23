<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datapembayaransiswa = $msbank->tampilpembayaransiswa();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daftar Pembayaran</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <style>
        .well{
            display: none;
        }
    </style>
    <body>
        <div class="container">
                    <div class="col-md-12">
                        <h1><center>Data Pembayaran</center></h1>
                        <a href="tambahpembayaran.php">Tambah</a>
                        <table>
                            <tr>
                                <td>No</td>
                                <td>NISN</td>
                                <td>Nama Siswa</td>
                                <td>Kelas</td>
                                <td>Alamat</td>
                                <td>Sisa Pembayaran</td>
                            </tr>
                            <?php $no=1; foreach($datapembayaransiswa as $pembayaransiswa) : ?>
                            <tr>
                                <td><?php echo $no; $no++ ?></td>
                                <td><?php echo $pembayaransiswa['nisn'] ?></td>
                                <td><?php echo $pembayaransiswa['nama_lengkap'] ?></td>
                                <td><?php echo $pembayaransiswa['kelas'] ?></td>
                                <td><?php echo $pembayaransiswa['alamat'] ?></td>
                                <td><?php echo $pembayaransiswa['pembayaran_sisa'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
        </div>
    </body>
</html>