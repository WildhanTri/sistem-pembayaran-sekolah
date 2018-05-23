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
	<link rel="stylesheet" type="text/css" href="../../assets/css/index1.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="../../assets/css/style2.css">

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
				Laporan
			</div>
			<div class="main" style="padding:20px;">
				<table class="table table-list" cellspacing="0">
                    <tr>
                        <td>No</td>
                        <td>Laporan</td>
                        <td>Rincian Laporan</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Jumlah Siswa</td>
                        <td>Rincian Laporan</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Laporan</td>
                        <td>Rincian Laporan</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Laporan</td>
                        <td>Rincian Laporan</td>
                    </tr>
                </table>
			</div>
		</div>
	
</body>
</html>