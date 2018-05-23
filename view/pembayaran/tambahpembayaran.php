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
				Tambah Pembayaran
			</div>
			<div class="main" style="padding:20px;">
                <form method="post" enctype="multipart/form-data" action="../../controller/msbank/submit.php" style="width:100%;" name="formpembayaran" id="formpembayaran">
                    <table class="table">
                        <tr>
                            <td>Nama Pembayaran</td>
                            <td>:</td>
                            <td><input type="text" name="namapembayaran" value="" class="input-mode" autocomplete="off" placeholder="Nama Pembayaran.."></td>
                        </tr>
                        <tr>
                            <td>Deskripsi Pembayaran</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="deskripsipembayaran" placeholder="Deskripsi..." class="input-mode" autocomplete="off" />
                            </td>
                        </tr>
                        <tr>
                            <td>Target Siswa</td>
                            <td>:</td>
                            <td>
                                <input type="button" name="checkboxall" onclick="check_all()" value="check all">
                            </td>
                        </tr>
                        <tr>        
                            <td colspan="2" align="right">Kelas &nbsp;</td>
                            <td>
                                <input type="checkbox" name="kelas[]" value="X">X
                                <input type="checkbox" name="kelas[]" value="XI">XI
                                <input type="checkbox" name="kelas[]" value="XII">XII
                            </td>
                        </tr>
                        <tr>
                                        
                            <td colspan="2" align="right">Jurusan &nbsp;</td>
                            <td>
                                <input type="checkbox" name="jurusan[]" value="AK">AK
                                <input type="checkbox" name="jurusan[]" value="APh">APh
                                <input type="checkbox" name="jurusan[]" value="MM">MM
                                <input type="checkbox" name="jurusan[]" value="RPL">RPL
                                <input type="checkbox" name="jurusan[]" value="TKR">TKR
                                <input type="checkbox" name="jurusan[]" value="TSM">TSM
                            </td>
                        </tr>
                        <tr>
                            <td>Total Pembayaran</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="totalpembayaran" id="totalpembayaran" autocomplete="off" class="input-mode" placeholder="Total Pembayaran.." style="width:30%" />
                            </td>
                        </tr>
                    </table>
                    <input type="submit" class="button button-blue" name="tambahpembayaran" value="Tambah">
                </form>
            </div>
		</div>
</body>
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script>
    /*
    function startCalculate(){
        interval=setInterval("Calculate()",10);
    }

    function Calculate(){
        var a=document.getElementById('jumlahangsuran').value;
        var b=document.getElementById('bayarperangsuran').value;
        var c=document.getElementById('totalpembayaran').value;
    
        document.formpembayaran.totalpembayaran.value=(a*b);
    }

    function stopCalc(){
        clearInterval(interval);
    }
    */
    function check_all(){
        var c = new Array();
        c = document.getElementsByTagName('input');

        for (var i = 0; i < c.length; i++){
            if (c[i].type == 'checkbox'){
                c[i].checked = true;
            }
        }
    }
    </script>
</html>