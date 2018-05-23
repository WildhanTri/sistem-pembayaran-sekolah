<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datasiswa = $msbank->tampilsiswa();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah Siswa</title>
        <link href="../../assets/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    </head>
    <style>
        .well{
            display: none;
        }
    </style>
    <body>
        
        <div class="container">
                    <div class="col-md-12">
                        <h1><center>Data Sswa</center></h1>
                        <table>
                            <tr>
                                <td>No</td>
                                <td>NISN</td>
                                <td>Nama Siswa</td>
                                <td>Kelas</td>
                                <td>Tempat Tanggal Lahir</td>
                                <td>Jenis Kelamin</td>
                                <td>Alamat</td>
                                <td>Action</td>
                            </tr>
                            <?php $no=1; foreach($datasiswa as $siswa) : ?>
                            <tr>
                                <td><?php echo $no; $no++ ?></td>
                                <td><?php echo $siswa['nisn'] ?></td>
                                <td><?php echo $siswa['nama_lengkap'] ?></td>
                                <td><?php echo $siswa['kelas'] ?></td>
                                <td><?php echo $siswa['tempat_lahir'] ?>,&nbsp;<?php echo $siswa['tanggal_lahir'] ?></td>
                                <td><?php echo $siswa['jk'] ?></td>
                                <td><?php echo $siswa['alamat'] ?></td>
                                <td><a href="editsiwa.php?NISN=<?php echo $siswa['nisn'] ?>">Edit</a><a href="../../controller/msbank/submit.php?deleteNISN=<?php echo $siswa['nisn'] ?>">Delete</a></td>
                            </tr>
                            <?php endforeach ?>
                            <tr>
                                <td colspan="2"><a href="tambahsiswa.php">Tambah</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
        </body>
</html>