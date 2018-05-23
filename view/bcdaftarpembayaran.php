<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datapembayaran = $msbank->tampilpembayaran();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah Siswa</title>
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
                                <td>Nama Pembayaran</td>
                            </tr>
                            <?php $no=1; foreach($datapembayaran as $pembayaran) : ?>
                            <tr>
                                <td><?php echo $no; $no++ ?></td>
                                <td><a href="daftarpembayaransiswa.php?aaa=<?php echo $pembayaran['id_pembayaran'] ?>"><?php echo $pembayaran['nama_pembayaran'] ?> </a></td>
                                <td><a href="daftarpembayaransiswa.php?aaa=<?php echo $pembayaran['id_pembayaran'] ?>">Edit</a><a href="daftarpembayaransiswa.php?aaa=<?php echo $pembayaran['id_pembayaran'] ?>">Hapus</a></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
        </div>
    </body>
</html>