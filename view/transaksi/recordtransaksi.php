<?php
require_once '../../controller/msbank/msbank.php';
$msbank = new msbank;
$datatransaksi = $msbank->tampiltransaksi();
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
			<div class="main" style="padding:15px; width:100%;">
                <!--
                <div class="filtersearch">
                    <input type="text" class="textbox" placeholder="Search..." />
                </div>
            -->
				<table class="table table-list" cellspacing="0">
                    <thead>
                        <td>No</td>
                        <td>Waktu Transaksi</td>
                        <td>Nama Siswa  </td>
                        <td>Nama Pembayaran</td>
                        <td>Sisa Pembayaran</td>
                        <td>Sisa Pembayaran Baru</td>
                        <td>Jumlah Bayar</td>
                    </thead>
                    <?php $no=1; foreach($datatransaksi as $transaksi) : ?>
                    <tr>
                        <td><?php echo $no; $no++ ?></td>
                        <td><?php echo $transaksi['transaksi_waktu'] ?></td>
                        <td><?php echo $transaksi['nama_lengkap'] ?></td>
                        <td><?php echo $transaksi['nama_pembayaran'] ?></td>
                        <td>Rp. <?php echo $transaksi['transaksi_sisapembayaran'] ?></td>
                        <td>Rp. <?php echo $transaksi['transaksi_sisapembayaranbaru'] ?></td>
                        <td>Rp. <?php echo $transaksi['transaksi_jumlahbayar'] ?></td>
                    <?php endforeach ?>
                </table>
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