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
                <!--
                <div class="filtersearch">
                    <input type="text" class="textbox" placeholder="Search..." />
                    <a href="tambahsiswa.php"><button class="button button-blue">Tambah</button></a>
                </div>
-->
				<table class="table table-list" cellspacing="0">
                    <thead>
                        <td>No</td>
                        <td>NISN</td>
                        <td>Nama Siswa</td>
                        <td>Kelas</td>
                        <td>Tempat Tanggal Lahir</td>
                        <td>Jenis Kelamin</td>
                        <td>Alamat</td>
                        <td>Action</td>
                    </thead>
                    <?php $no=1; foreach($datasiswa as $siswa) : ?>
                    <tr>
                        <td><?php echo $no; $no++ ?></td>
                        <td><?php echo $siswa['nisn'] ?></td>
                        <td><?php echo $siswa['nama_lengkap'] ?></td>
                        <td><?php echo $siswa['kelas'] ?></td>
                        <td><?php echo $siswa['tempat_lahir'] ?>,&nbsp;<?php echo $siswa['tanggal_lahir'] ?></td>
                        <td><?php echo $siswa['jk'] ?></td>
                        <td><?php echo $siswa['alamat'] ?></td>
                        <td><a href="editsiwa.php?NISN=<?php echo $siswa['nisn'] ?>"><button class="button button-green" style="margin-right:5px;">Edit</button></a><a href="../../controller/msbank/submit.php?deleteNISN=<?php echo $siswa['nisn'] ?>"><button class="button button-red">Hapus</button></a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
			</div>
		</div>
	
</body>
</html>