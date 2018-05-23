<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datasiswa = $msbank->tampilsiswa();
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Area</title>
	<?php include '../adder/calling.php'; ?>

</head>
<body>
		<div class="header">
			<div class="user">
			<span>Welcome, <?php echo $_SESSION['user']; ?></span>
			<a href="../../controller/msbank/submit.php?logout">
			<span><i class="fa fa-user" title="Logout"></i></span></a>
			
			</div>
		</div>
		<div class="side-nav">
			<div class="logo">
				<span>APPES</span>
			</div>
            <?php include '../adder/sidebar.php' ?>
		</div>
		<div class="main-content">
			<div class="title">
				Daftar Siswa
			</div>
			<div class="main" style="padding:20px;">
                <form method="post" enctype="multipart/form-data" action="../../controller/msbank/submit.php" style="width:100%;">
                    <table class="table">
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><input type="text" name="nisn" id="nisn" value="" class="input-mode" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama1" placeholder="First Name" class="input-mode" style="width:30%" autocomplete="off">
                                <input type="text" name="nama2" placeholder="Middle Name" class="input-mode" style="width:30%" autocomplete="off">
                                <input type="text" name="nama3" placeholder="Last Name" class="input-mode" style="width:30%" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>
                                <select class="input-mode" style="width:10%" name="kelas1">
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                </select>
                                <select class="input-mode" style="width:10%" name="kelas2">
                                    <option value="RPL">RPL</option>
                                    <option value="APh">APh</option>
                                    <option value="AK">AK</option>
                                    <option value="TSM">TSM</option>
                                    <option value="MM">MM</option>
                                    <option value="TKR">TKR</option>
                                </select>
                                <select class="input-mode" style="width:10%" name="kelas3">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <select class="input-mode" style="width:20%" name="jk">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td><input type="text" class="input-mode" style="width:20%" name="tempatlahir" autocomplete="off"><input type="date" class="input-mode" style="width:20%" name="tanggallahir"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><input type="text" name="alamat" id="alamat" class="input-mode" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td>Foto Siswa</td>
                            <td>:</td>
                            <td><input type="file" name="fotosiswa" id="file-2"></td>
                        </tr>
                    </table>
                    <input type="submit" class="button button-blue" name="tambahsiswa" value="Tambah">
                </form>
            </div>
		</div>
</body>
</html>