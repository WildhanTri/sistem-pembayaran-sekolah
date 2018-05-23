<?php
require_once 'msbank.php';
    
    if(isset($_POST['login'])){
        $data = array(
            'username' => $_POST['username'],
            'password' => $_POST['password']
        );
        
        $msbank = new msbank;
        $submit = $msbank->login($data);
        if($submit == true){
            echo "<script>alert('Login Berhasil'); location.href='../../view/home/home.php'</script>";
        }
    }

    if(isset($_POST['loginsiswa'])){
        $nisn = $_POST['nisn'];
        $msbank = new msbank;
        $submit = $msbank->loginsiswa($nisn);
        if($submit == true){
            echo "<script>location.href='../../view/homesiswa/home.php'</script>";
        }
    }

    if(isset($_GET['logout'])){
        $msbank = new msbank;
        $submit = $msbank->logout();
            echo "<script>alert('Logout berhasil'); location.href='../../view/login/login.php'</script>";
    }
    if(isset($_GET['logoutsiswa'])){
        $msbank = new msbank;
        $submit = $msbank->logout();
            echo "<script>location.href='../../view/homesiswa/loginsiswa.php'</script>";
    }

    if(isset($_POST['editsiswa'])){
        $data = array(
            'nisn' => $_POST['nisn'],
            'namadepan' => $_POST['nama1'],
            'namatengah' => $_POST['nama2'],
            'namabelakang' => $_POST['nama3'],
            'kelasangkatan' => $_POST['kelas1'],
            'kelasjurusan' => $_POST['kelas2'],
            'kelasnomer' => $_POST['kelas3'],
            'jk' => $_POST['jk'],
            'tempatlahir' => $_POST['tempatlahir'],
            'tanggallahir' => $_POST['tanggallahir'],
            'alamat' => $_POST['alamat'],
            'namafotosiswa' => $_FILES['fotosiswa']['name'],
            'tmpfotosiswa' => $_FILES['fotosiswa']['tmp_name']
        );
        $msbank = new msbank;
        $submit = $msbank->proseseditsiswa($data);
            echo "<script>alert('Edit Data Berhasil'); location.href='../../view/siswa/daftarsiswa.php'</script>";
    }

    if(isset($_GET['deleteNISN'])){
        $data = $_GET['deleteNISN'];
        $msbank = new msbank;
        $submit = $msbank->deletesiswa($data);
            echo "<script>alert('Delete Data Berhasil'); location.href='../../view/siswa/daftarsiswa.php'</script>";
        
    }
    if(isset($_GET['deletePembayaran'])){
        $data = $_GET['deletePembayaran'];
        $msbank = new msbank;
        $submit = $msbank->deletepembayaran($data);
            echo "<script>alert('Delete Data Berhasil'); location.href='../../view/pembayaran/daftarpembayaran.php'</script>";
        
    }

    if(isset($_POST['tambahsiswa'])){
        $data = array(
            'nisn' => $_POST['nisn'],
            'namadepan' => $_POST['nama1'],
            'namatengah' => $_POST['nama2'],
            'namabelakang' => $_POST['nama3'],
            'kelasangkatan' => $_POST['kelas1'],
            'kelasjurusan' => $_POST['kelas2'],
            'kelasnomer' => $_POST['kelas3'],
            'jk' => $_POST['jk'],
            'tempatlahir' => $_POST['tempatlahir'],
            'tanggallahir' => $_POST['tanggallahir'],
            'alamat' => $_POST['alamat'],
            'namafotosiswa' => $_FILES['fotosiswa']['name'],
            'tmpfotosiswa' => $_FILES['fotosiswa']['tmp_name']
        );
            
        $msbank = new msbank;
        $msbank->tambahsiswa($data);
        echo "<script>alert('Tambah Siswa Berhasil'); location.href='../../view/siswa/daftarsiswa.php'</script>";
    }

    if(isset($_POST['tambahpembayaran'])){
        $data = array( 
            'namapembayaran' => $_POST['namapembayaran'],
            'deskripsipembayaran' => $_POST['deskripsipembayaran'],
            'kelas' => $_POST['kelas'],
            'jurusan' => $_POST['jurusan'],
            'totalpembayaran' => $_POST['totalpembayaran']
        );  
        $msbank = new msbank;
        $msbank->tambahpembayaran($data);
        echo "<script>alert('Tambah Pembayaran Berhasil'); location.href='../../view/pembayaran/daftarpembayaran.php'</script>";
    }

    if(isset($_GET['datapembayaransiswa'])){
        
        $nisn = $_GET['datapembayaransiswa'];
        $msbank = new msbank;
        $msbank->tampildatapembayaran($nisn);
    }
    
    if(isset($_POST['transaksi'])){
        $data = array(
            'nisn' => $_POST['nisn'],
            'idpembayaran' => $_POST['group1'],
            'uangsiswa' => $_POST['uangsiswa'],
        );
        $msbank = new msbank;
        $msbank->updatePembayaran($data);
        echo "<script>location.href='../../view/transaksi/transaksi.php'</script>";
    }
?>