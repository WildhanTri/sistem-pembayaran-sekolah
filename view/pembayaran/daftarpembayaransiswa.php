<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datapembayaransiswa = $msbank->tampilpembayaransiswa();
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
				Data Pembayaran
			</div>
			<div class="main" style="padding:20px;">
                <!--
                <div class="filtersearch">
                    <input type="text" class="textbox" placeholder="Search..." />
                    <a href="tambahpembayaran.php"><button class="button button-blue">Tambah</button></a>
                </div>
                -->
				<table class="table table-list" cellspacing="0">
                    <thead>
                        <td>No</td>
                        <td>NISN</td>
                        <td>Nama Siswa</td>
                        <td>Kelas</td>
                        <td>Alamat</td>
                        <td>Sisa Pembayaran</td>
                    </thead>
                    <?php $no=1; foreach($datapembayaransiswa as $pembayaransiswa) : ?>
                    <tr>
                        <td><?php echo $no; $no++ ?></td>
                        <td><?php echo $pembayaransiswa['nisn'] ?></td>
                        <td><?php echo $pembayaransiswa['nama_lengkap'] ?></td>
                        <td><?php echo $pembayaransiswa['kelas'] ?></td>
                        <td><?php echo $pembayaransiswa['alamat'] ?></td>
                        <td>Rp. <?php echo $pembayaransiswa['pembayaran_sisa'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
			</div>
		</div>
	
</body>
</html>