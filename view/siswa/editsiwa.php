<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datasiswa = $msbank->tampileditsiswa();
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
				Edit Siswa
			</div>
			<div class="main" style="padding:20px;">
                <form method="post" enctype="multipart/form-data" action="../../controller/msbank/submit.php" style="width:100%;">
                    <table class="table">
                        <?php foreach($datasiswa as $data) : ?>
                        <tr>
                            <td>NIS</td>
                            <td>:</td>
                            <td><input type="text" name="nisn" id="nisn" value="<?php echo $data['nisn'] ?>" class="input-mode" autocomplete="off" readonly></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama1" placeholder="First Name" class="input-mode" style="width:30%" value="<?php echo $data['nama_depan'] ?>" autocomplete="off">
                                <input type="text" name="nama2" placeholder="Middle Name" class="input-mode" style="width:30%" value="<?php echo $data['nama_tengah'] ?>" autocomplete="off">
                                <input type="text" name="nama3" placeholder="Last Name" class="input-mode" style="width:30%" value="<?php echo $data['nama_belakang'] ?>" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>
                                <select class="input-mode" style="width:10%" name="kelas1">
                                    <option value="X" <?php if($data['kelas'] == "X"){ echo "selected"; }?>>X</option>
                                    <option value="XI" <?php if($data['kelas'] == "XI"){ echo "selected"; }?>>XI</option>
                                    <option value="XII" <?php if($data['kelas'] == "XII"){ echo "selected"; }?>>XII</option>
                                </select>
                                <select class="input-mode" style="width:10%" name="kelas2">
                                    <option value="RPL" <?php if($data['jurusan'] == "RPL"){ echo "selected"; }?>>RPL</option>
                                    <option value="APh" <?php if($data['jurusan'] == "APh"){ echo "selected"; }?>s>APh</option>
                                    <option value="AK" <?php if($data['jurusan'] == "AK"){ echo "selected"; }?>>AK</option>
                                    <option value="TSM" <?php if($data['jurusan'] == "TSM"){ echo "selected"; }?>>TSM</option>
                                    <option value="MM" <?php if($data['jurusan'] == "MM"){ echo "selected"; }?>>MM</option>
                                    <option value="TKR" <?php if($data['jurusan'] == "TKR"){ echo "selected"; }?>>TKR</option>
                                </select>
                                <select class="input-mode" style="width:10%" name="kelas3">
                                    <option value="1" <?php if($data['nomer_kelas'] == "1"){ echo "selected"; }?>>1</option>
                                    <option value="2" <?php if($data['nomer_kelas'] == "2"){ echo "selected"; }?>>2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>
                                <select class="input-mode" style="width:20%" name="jk">
                                    <option value="Laki-laki" <?php if($data['jk'] == 'Laki-laki'){echo "selected"; } ?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if($data['jk'] == 'Perempuan'){echo "selected"; } ?>>Perempuan</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat Tanggal Lahir</td>
                            <td>:</td>
                            <td><input type="text" class="input-mode" style="width:20%" name="tempatlahir" autocomplete="off" value="<?php echo $data['tempat_lahir'] ?>"><input type="date" class="input-mode" style="width:20%" name="tanggallahir" value="<?php echo $data['tanggal_lahir'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><input type="text" name="alamat" id="alamat" class="input-mode" autocomplete="off" value="<?php echo $data['alamat'] ?>"></td>
                        </tr>
                        <tr>
                            <td>Foto Siswa</td>
                            <td>:</td>
                            <td><input type="file" name="fotosiswa" id="file-2" value="<?php echo $data['foto'] ?>"></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <input type="submit" class="button button-blue" name="editsiswa" value="Ubah">
                </form>
            </div>
		</div>
</body>
</html>