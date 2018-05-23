<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datapembayaran = $msbank->tampilpembayaran();
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
				Daftar Pembayaran
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
                        <td>Nama Pembayaran</td>
                        <td>Tanggal Pembayaran</td>
                        <td>Total Pembayaran</td>
                        <td>Action</td>
                    </thead>
                    <?php $no=1; foreach($datapembayaran as $pembayaran) : ?>
                    <tr>
                        <td><?php echo $no; $no++ ?></td>
                        <td><?php echo $pembayaran['nama_pembayaran'] ?></td>
                        <td><?php echo $pembayaran['tanggal_pembayaran'] ?></td>
                        <td>Rp. <?php echo $pembayaran['total_pembayaran'] ?></td>
                        <td>
                            <a href="daftarpembayaransiswa.php?aaa=<?php echo $pembayaran['id_pembayaran'] ?>"><button class="button button-blue" style="margin-right:5px;">Detail</button></a>
                            <a href="../../controller/msbank/submit.php?deletePembayaran=<?php echo $pembayaran['id_pembayaran'] ?>"><button class="button button-red">Hapus</button></a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
			</div>
		</div>
	
</body>
</html>