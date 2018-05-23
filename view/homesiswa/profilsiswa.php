<?php 
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datasiswa = $msbank->tampilprofilesiswa($_SESSION['nisn']);
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
    </div>
    <div style="position:absolute; margin-top:50px; width:100%;">
        <center>
        <div class="table" style="border:1px solid black; width:60%; text-align:left; padding:10px 20px;">
            <?php foreach($datasiswa as $siswa) : ?>
            <h1>Profil Siswa :</h1>
            <p>NISN :</p>
            <p><?php echo $siswa['nisn'] ?></p>
            <p>Nama Lengkap :</p>
            <p><?php echo $siswa['nama_lengkap'] ?></p>
            <p>Kelas :</p>
            <p><?php echo $siswa['kelas'] ?></p>
            <p>Tempat Tanggal Lahir :</p>
            <p><?php echo $siswa['tempat_lahir'].", ".$siswa['tanggal_lahir'] ?></p>
            <p>Jenis Kelamin :</p>
            <p><?php echo $siswa['jk'] ?></p>
            <p>Alamat :</p>
            <p><?php echo $siswa['alamat'] ?></p>
            <?php endforeach ?>
        </div>
        </center>
    </div>
</body>
</html>