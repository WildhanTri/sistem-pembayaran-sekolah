<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WebCodeCamJS</title>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="../assets/js/jquery.js"></script>
    </head>
    <style>
        .well{
            display: none;
        }
    </style>
    <body>
        
        <div class="container" id="QR-Code">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="navbar-form navbar-left">
                        <h4>WebCodeCamJS.js Demonstration</h4>
                    </div>
                    <div class="navbar-form navbar-right">
                        <select class="form-control" id="camera-select"></select>
                        <div class="form-group">
                            <input id="image-url" type="text" class="form-control" placeholder="Image url">
                            <button title="Decode Image" class="btn btn-default btn-sm" id="decode-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-upload"></span></button>
                            <button title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                            <button title="Play" class="btn btn-success btn-sm" id="play" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-play"></span></button>
                            <button title="Pause" class="btn btn-warning btn-sm" id="pause" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-pause"></span></button>
                            <button title="Stop streams" class="btn btn-danger btn-sm" id="stop" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-stop"></span></button>
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
                    <div class="col-md-12">
                        <form>
                            <table>
                                <tr>
                                    <td>NIS</td>
                                    <td>:</td>
                                    <td><input type="text" name="nisn" id="nisn" value=""> <button type="button" id="btn-search">Cari</button> <span id="loading">LOADING...</span></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><input type="text" name="nama" id="nama"></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><input type="text" name="kelas" id="kelas"></td>
                                </tr>
                                <tr>
                                    <td>Tempat Tanggal Lahir</td>
                                    <td>:</td>
                                    <td><input type="text" name="ttl" id="ttl"></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><input type="text" name="alamat" id="alamat"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
function search(){
  $("#loading").show(); // Tampilkan loadingnya
  
  $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "../tampildata.php", // Isi dengan url/path file php yang dituju
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
        $("#nama").val(response.nama_lengkap); // set textbox dengan id nama
        $("#kelas").val(response.kelas); // set textbox dengan id jenis kelamin
        $("#ttl").val(response.ttl); // set textbox dengan id telepon
        $("#alamat").val(response.alamat); // set textbox dengan id alamat
      }else{ // Jika isi dari array status adalah failed
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
    
    $("#nisn").on('input', function(){ // Ketika user menekan tombol di keyboard
    if(event.keyCode == 13){ // Jika user menekan tombol ENTER
      search(); // Panggil function search
    }
  });
});
</script>  
            <script type="text/javascript" src="../assets/plugin/webcodecamjs/qrcodelib.js"></script>
            <script type="text/javascript" src="../assets/plugin/webcodecamjs/webcodecamjquery.js"></script>
            <script type="text/javascript" src="../assets/plugin/webcodecamjs/mainjquery.js"></script>
            <script type="text/javascript" src="../assets/plugin/webcodecamjs/filereader.js"></script>
        <!-- Using jquery version: -->
        <!--
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/qrcodelib.js"></script>
            <script type="text/javascript" src="js/webcodecamjquery.js"></script>
            <script type="text/javascript" src="js/mainjquery.js"></script>
            
                    <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjs.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
-->
    </body>
</html>