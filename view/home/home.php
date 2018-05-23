<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:../login/login.php');
    }
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
				Dashboard
			</div>
			<div class="main">
				<div class=" box box1">
					<div class="isi">
						<h2>Laporan</h2>
						<i class="fa fa-pie-chart"></i>
						
					</div>
						<a href="#"><p>Lihat <i class="fa fa-arrow-right"></i></p></a>
					
				
				</div>
				<div class="box box2">
					<div class="isi2">
						<h2>Pembayaran</h2>
						<i class="fa fa-money"></i>
					</div>
					<a href="../pembayaran/pembayaran.php"><p>Lihat <i class="fa fa-arrow-right"></i></p></a>
				</div>
				<div class="box box3">
					<div class="isi3">
						<h2>Transaksi</h2>
						<i class="fa fa-credit-card"></i>
						
					</div>
						<a href="../transaksi/transaksi.php"><p>Lihat <i class="fa fa-arrow-right"></i></p></a>
				</div>
				<div class="box box4">
					<div class="isi4">
						<h2>Data Siswa</h2>
						<i class="fa fa-users"></i>
					</div>
						<a href="../siswa/daftarsiswa.php"><p>Lihat <i class="fa fa-arrow-right"></i></p></a>
	
				</div>
			</div>
		</div>
	
</body>
</html>