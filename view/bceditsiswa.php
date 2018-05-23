<?php
require_once '../../controller/msbank/msbank.php';

$msbank = new msbank;
$datasiswa = $msbank->tampileditsiswa();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah Siswa</title>
        <link href="../../css/style.css" rel="stylesheet">
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
                        <h1><center>Tambah Sswa</center></h1>
                        <form action="../../controller/msbank/submit.php" method="post" enctype="multipart/form-data">
                            <table>
                                <?php foreach($datasiswa as $data) : ?>
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td><input type="text" name="nisn" value="<?php echo $data['nisn'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Nama Siswa</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="nama1" placeholder="First Name" value="<?php echo $data['nama_depan'] ?>" autocomplete="off">
                                        <input type="text" name="nama2" placeholder="Middle Name" value="<?php echo $data['nama_tengah'] ?>" autocomplete="off">
                                        <input type="text" name="nama3" placeholder="Last Name" value="<?php echo $data['nama_belakang'] ?>" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>
                                        <select name="kelas1">
                                            <option value="X" <?php if($data['kelas'] == "X"){ echo "selected"; }?> >X</option>
                                            <option value="XI" <?php if($data['kelas'] == "XI"){ echo "selected"; }?>>XI</option>
                                            <option value="XII" <?php if($data['kelas'] == "XII"){ echo "selected"; }?>>XII</option>
                                        </select>
                                        <select name="kelas2">
                                            <option value="RPL" <?php if($data['jurusan'] == "RPL"){ echo "selected"; }?>>RPL</option>
                                            <option value="APh" <?php if($data['jurusan'] == "APh"){ echo "selected"; }?>>APh</option>
                                            <option value="AK" <?php if($data['jurusan'] == "AK"){ echo "selected"; }?>>AK</option>
                                            <option value="TSM" <?php if($data['jurusan'] == "TSM"){ echo "selected"; }?>>TSM</option>
                                            <option value="MM" <?php if($data['jurusan'] == "MM"){ echo "selected"; }?>>MM</option>
                                            <option value="TKR" <?php if($data['jurusan'] == "TKR"){ echo "selected"; }?>>TKR</option>
                                        </select>
                                        <select name="kelas3">
                                            <option value="1" <?php if($data['nomer_kelas'] == "1"){ echo "selected"; }?>>1</option>
                                            <option value="2" <?php if($data['nomer_kelas'] == "2"){ echo "selected"; }?>>2</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><input type="text" name="tempatlahir" value="<?php echo $data['tempat_lahir'] ?>"style="width:30%;"/><input type="date" name="tanggallahir" value="<?php echo $data['tanggal_lahir'] ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>
                                        <select name="jk">
                                            <option <?php if($data['jk'] == 'Laki-laki'){echo "selected"; } ?>>Laki-laki</option>
                                            <option <?php if($data['jk'] == 'Perempuan'){echo "selected"; } ?>>Perempuan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><input type="text" name="alamat" value="<?php echo $data['alamat'] ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Foto Siswa</td>
                                    <td>:</td>
                                    <td><input type="file" name="fotosiswa" id="file-2" value="<?php echo $data['foto'] ?>"></td>
                                </tr>
                                <?php endforeach ?>
                                <tr>
                                    <td><input type="submit" value="edit" name="editsiswa"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
        </body>
</html>