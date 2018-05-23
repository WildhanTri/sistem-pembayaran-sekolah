<?php 
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datasiswa = $msbank->tampilprofilesiswa($_SESSION['nisn']);
$datapembayaran = $msbank->tampilpembayaranprofilesiswa($_SESSION['nisn']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User Area|APPES</title>
	<link rel="stylesheet" href="../../css/user1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style2.css">
</head>
<body>
	<div class="header">
			<div class="user">
      <nav>
			<ul>

      <li><a href="../../controller/msbank/submit.php?logoutsiswa"><i class="fa fa-user" title="Logout"></i></a></li>
      <li><a href="profilsiswa.php">Profile</a></li>
      <li><a href="home.php">Home</a></li>
      </ul></nav>
		<div class="logo">
			<h2>APPES</h2>
		</div>
	</div>
	<div style="position:absolute; margin-top:50px; width:100%;">
        <center>
        <table class="table" style="width:60%; text-align:left; padding:10px 20px;">
            <?php foreach($datasiswa as $siswa)  : ?>
            <tr>
                <td>NISN : <?php echo $siswa['nisn'] ?></td>
            </tr>
            <tr>
                <td>Nama Siswa : <?php echo $siswa['nama_lengkap'] ?></td>
            </tr>
            <?php endforeach ?>
            <tr>
                <td>
                <table class="table table-list" style="border:1px solid black; width:100%; text-align:left; padding:10px 20px;" cellspacing="0">
                    <thead>
                        <td>Nama Pembayaran</td>
                        <td>Sisa Pembayaran</td>
                    </thead>
                    <?php foreach($datapembayaran as $pembayaran) : ?>
                    <tr>
                        <td><?php echo $pembayaran['nama_pembayaran'] ?></td>
                        <td><?php echo $pembayaran['pembayaran_sisa'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </table>
                </td>
            </tr>
        </table>
        </center>
    </div>
    </div>
</body>
</html>