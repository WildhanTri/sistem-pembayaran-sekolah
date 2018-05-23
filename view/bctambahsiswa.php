<!DOCTYPE html>
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
                        <form method="post" enctype="multipart/form-data" action="../../controller/msbank/submit.php">
                            <table>
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td><input type="text" name="nisn" id="nisn" value="" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" name="nama1" placeholder="First Name" autocomplete="off">
                                        <input type="text" name="nama2" placeholder="Middle Name" autocomplete="off">
                                        <input type="text" name="nama3" placeholder="Last Name" autocomplete="off">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td>
                                        <select name="kelas1">
                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                        <select name="kelas2">
                                            <option value="RPL">RPL</option>
                                            <option value="APh">APh</option>
                                            <option value="AK">AK</option>
                                            <option value="TSM">TSM</option>
                                            <option value="MM">MM</option>
                                            <option value="TKR">TKR</option>
                                        </select>
                                        <select name="kelas3">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>
                                        <select name="jk">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><input type="text" name="tempatlahir" autocomplete="off"><input type="date" name="tanggallahir"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><input type="text" name="alamat" id="alamat" autocomplete="off"></td>
                                </tr>
                                <tr>
                                    <td>Foto Siswa</td>
                                    <td>:</td>
                                    <td><input type="file" name="fotosiswa" id="file-2"></td>
                                </tr>
                            </table>
                            <input type="submit" name="tambahsiswa" value="tambah">
                        </form>
                    </div>
                </div>
        </body>
</html>