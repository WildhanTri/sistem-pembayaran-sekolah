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
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style2.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Source+Sans+Pro" rel="stylesheet">
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
</head>
    <style>
        .well{
            display: none;
        }
        body {
            padding-top:0px;
        }
        
        .photoprofile {
            width:120px;
            height:120px;
            border-radius: 60px;
        }
        
        
    </style>
    <body style="height:100%;">
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
		<div class="main-content" id="QR-Code">
			<div class="title">
                <div>Transaksi</div><div> <a href="transaksi.php">Scan</a><a href="recordtransaksi.php">Record Transaksi</a></div>
			</div>
			<div class="main" style="padding:15px; text-align:center; float:left; width:60%;">
                <center>
				<div class="panel-heading">
                    <div class="navbar-form navbar-left">
                        <div class="form-group">
                            <select class="form-control" id="camera-select"></select>
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="fa fa-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="fa fa-file-image-o"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="fa fa-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="fa fa-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="fa fa-stop"></span></button>
                         </div>
                    </div>
                </div>
                <div class="panel-body text-center">
                    <div class="col-md-12" style="">
                        <div class="well" style="position: relative;display: inline-block;">
                            <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                            <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                            <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                        </div>
                        <div class="well" style="width: 100%;">
                            <label id="zoom-value" width="100">Zoom: 2</label>
                            <input id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="0">
                            <label id="brightness-value" width="100">Brightness: 0</label>
                            <input id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                            <label id="contrast-value" width="100">Contrast: 0</label>
                            <input id="contrast" onchange="Page.changeContrast();" type="range" min="-128" max="128" value="0">
                            <label id="threshold-value" width="100">Threshold: 0</label>
                            <input id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                            <label id="sharpness-value" width="100">Sharpness: off</label>
                            <input id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                            <label id="grayscale-value" width="100">grayscale: off</label>
                            <input id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                            <br>
                            <label id="flipVertical-value" width="100">Flip Vertical: off</label>
                            <input id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                            <label id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                            <input id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
                        </div>
                    </div>
			     </div>
                </center>
            </div>
            <div class="main" style="padding:15px; float:left; width:40%; height:100%; background-color:rgb(52, 152, 219);">
                <div class="panel-body text-center" style="width:100%;">
                    <div class="col-md-12">
                        <form action="../../controller/msbank/submit.php" method="post">
                            <table style="width:100%; color:white;">
                                <tr>
                                    <td colspan="3" style="border-bottom:2px solid white"><h3>Biodata Siswa</h3></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:center;">
                                        <img src="../../assets/images/default.jpg" class="photoprofile" id="photoprofile" name="foto">
                                    </td>
                                </tr>
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td><input type="text" name="nisn" id="nisn" value="" class="input-mode" style="padding:5px 10px;" readonly></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" id="nama" class="input-mode" style="padding:5px 10px;"></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><input type="text" name="kelas" id="kelas" class="input-mode" style="padding:5px 10px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border-bottom:2px solid white; padding-top:20px;"><h3>Pilih Pembayaran :</h3></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <table class="table" id="table" style="color:white;">
                                            <tr>
                                                <Td colspan="3">Pembayaran Kosong.</Td>
                                            </tr>
                                        </table>
                                        jumlah uang yang dibayarkan : <input type="text" class="input-mode" name="uangsiswa"/>
                                        <input type="submit" class="button button-green" value="Bayar" name="transaksi">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
    
 <script>
function search(){
  $("#loading").show(); // Tampilkan loadingnya
  
  $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "../../controller/msbank/tampildata.php", // Isi dengan url/path file php yang dituju
        data: {nisn : $("#nisn ").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
            $("#loading").hide(); // Sembunyikan loadingnya
            
            if(response.status == "success"){ // Jika isi dari array status adalah success
        $("#photoprofile").attr('src','../../assets/data/siswa/'+response.foto); // set textbox dengan id nama
        $("#nama").val(response.nama_lengkap); // set textbox dengan id nama
        $("#kelas").val(response.kelas); // set textbox dengan id jenis kelamin
        
        $("#table").empty();
        $.each(response.pembayaran, function(i,item){
            $("<tr><fieldset id='group1'></fieldset></tr>").html("<td><input type='radio' value="+item.id_pembayaran+" name='group1'/></td>"+"<td>"+item.nama_pembayaran+"</td>"+"<td>Rp. "+item.pembayaran_sisa+"</td>").appendTo('#table');
        });
        }
        else{ // Jika isi dari array status adalah failed
            alert("Data Tidak Ditemukan");
        }
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
            alert(xhr.responseText);
        }
    });
}
$(document).ready(function(){
  $("#loading").hide(); // Sembunyikan loadingnya
  
    $("#nisn").on('keydown change',function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });
    
    $("#nisn").keyup(function(){ // Ketika user menekan tombol di keyboard
    if(event.keyCode == 13){ // Jika user menekan tombol ENTER
      search(); // Panggil function search
    }
  });
});

</script>  
<script type="text/javascript" src="../../assets/plugin/webcodecamjs/qrcodelib.js"></script>
<script type="text/javascript" src="../../assets/plugin/webcodecamjs/webcodecamjquery.js"></script>
<script type="text/javascript" src="../../assets/plugin/webcodecamjs/mainjquery.js"></script>
<script type="text/javascript" src="../../assets/plugin/webcodecamjs/filereader.js"></script>    
    
</html>