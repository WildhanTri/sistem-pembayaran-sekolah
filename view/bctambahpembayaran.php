<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tambah Pembayaran</title>
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <style>
        .well{
            display: none;
        }
    </style>
    <body>
        <div class="container">
                    <div class="col-md-12">
                        <form method="post" action="../../controller/msbank/submit.php" name="formpembayaran" id="formpembayaran">
                            <table>
                                <tr>
                                    <td>Nama Pembayaran</td>
                                    <td>:</td>
                                    <td><input type="text" name="namapembayaran" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi Pembayaran</td>
                                    <td>:</td>
                                    <td><input type="text" name="deskripsipembayaran" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td>Target Siswa</td>
                                    <td>:</td>
                                    <td><input type="button" name="checkboxall" onclick="check_all()" value="check all"></td>
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
                                    <td>Jumlah Angsuran</td>
                                    <td>:</td>
                                    <td><input type="text" name="jumlahangsuran" id="jumlahangsuran" autocomplete="off" onfocus="startCalculate()" onblur="stopCalc()" /></td>
                                </tr>
                                <tr>
                                    <td>Bayar per Angsuran</td>
                                    <td>:</td>
                                    <td><input type="text" name="bayarperangsuran" id="bayarperangsuran" autocomplete="off" onfocus="startCalculate()" onblur="stopCalc()" /></td>
                                </tr>
                                <tr>
                                    <td>Total Pembayaran</td>
                                    <td>:</td>
                                    <td><input type="text" name="totalpembayaran" id="totalpembayaran" autocomplete="off" onfocus="startCalculate()" onblur="stopCalc()" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="tambahpembayaran" /></td>
                                </tr>
                            </table>
                        </form>
                    </div>
        </div>
    </body>
    <script type="text/javascript" src="../../assets/js/jquery.js"></script>
    <script>
    
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