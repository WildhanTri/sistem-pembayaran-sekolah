<?php
    include '../php/prosesdaftarpembayaran.php';
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
                        <a href="#">Tambah</a>
                        <table>
                            <tr>
                                <td>No</td>
                                <td>Nama Pembayaran</td>
                            </tr>
                            <?php $no=1; foreach(pembayaran as $pbr) : ?>
                            <tr>
                                <td><?php echo $no; $no++ ?></td>
                                <td><a href="#"><?php echo $pbr['nama_pembayaran'] ?> </a></td>
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
        </div>
    </body>
</html>