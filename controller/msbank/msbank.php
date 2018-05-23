<?php
session_start();
class msbank {
        
        public function login($data){
            require_once '../../model/model.php';
            
            $username = $data['username'];
            $password = $data['password'];
            
            $model = new model;
            
            $login = $model->selectWhere("user", "username='$username' and password='$password'");
            $_SESSION['user'] = $username;
            
            return $login;
        }
    
        public function loginsiswa($data){
            require_once '../../model/model.php';
            
            $nisn = $data;
            
            $model = new model;
            
            $login = $model->selectWhere("siswa", "nisn = '$nisn'");
            $_SESSION['nisn'] = $nisn;
            
            return $login;
        }
    
        public function logout(){
            session_destroy();
        }
        
		public function tampilsiswa(){
            require_once '../../model/model.php';
            $model = new model;
            
            return $datasiswa = $model->select("siswa");
        }
    
        public function tampileditsiswa(){
            require_once '../../model/model.php';
            $model = new model;
            $NISN = $_GET['NISN'];
            return $datasiswa = $model->select3TableWhere("siswa", "siswa_kelas", "siswa_nama", "siswa.nisn = siswa_kelas.id_siswa", "siswa.nisn = siswa_nama.id_siswa", "NISN='$NISN'");
        }
    
        public function proseseditsiswa($data){
            require_once '../../model/model.php';
            
            $nisn = $data['nisn'];
            $namadepan = $data['namadepan'];
            $namatengah = $data['namatengah'];
            $namabelakang = $data['namabelakang'];
            $namalengkap = $namadepan.' '.$namatengah.' '.$namabelakang;
            $kelasangkatan = $data['kelasangkatan'];
            $kelasjurusan = $data['kelasjurusan'];
            $kelasnomer = $data['kelasnomer'];
            $kelas = $kelasangkatan.' '.$kelasjurusan.' '.$kelasnomer;
            $jk = $data['jk'];
            $tempatlahir = $data['tempatlahir'];
            $tanggallahir = $data['tanggallahir'];
            $alamat = $data['alamat'];
            $namafotosiswa = $data['namafotosiswa'];
            $tmpfotosiswa = $data['tmpfotosiswa'];
            
            $model = new model;
            $model->updateWhere("siswa", "nama_lengkap='$namalengkap', kelas='$kelas', tempat_lahir='$tempatlahir', tanggal_lahir='$tanggallahir', jk='$jk', alamat='$alamat'", "NISN='$nisn'");
            $model->updateWhere("siswa_kelas", "kelas='$kelasangkatan', jurusan='$kelasjurusan', nomer_kelas='$kelasnomer'", "id_siswa='$nisn'");
            $model->updateWhere("siswa_nama", " nama_depan='$namadepan', nama_tengah='$namatengah', nama_belakang='$namabelakang'", "id_siswa='$nisn'");
        }
    
        public function deletesiswa($data){
            require_once '../../model/model.php';
            
            $nisn = $data;
            
            $model = new model;
            $siswa = $model->selectWhere("siswa", "NISN='$data'");
            var_dump($siswa);
            $fotosiswa = $siswa['0']['foto'];
            var_dump($fotosiswa);
            unlink($_SERVER['DOCUMENT_ROOT'] .'/paheri/assets/data/siswa/qrcode/'.$data.'.jpg');
            unlink($_SERVER['DOCUMENT_ROOT'] .'/paheri/assets/data/siswa/'.$fotosiswa);
            return $datasiswa = $model->delete("siswa", "NISN='$nisn'");
        }
        public function deletepembayaran($data){
            require_once '../../model/model.php';
            
            $id = $data;
            $model = new model;
            return $datasiswa = $model->delete("pembayaran", "id_pembayaran='$id'");
        }
    
        public function tambahsiswa($data){
            require_once '../../model/model.php';
            include "../../assets/plugin/phpqrcode/qrlib.php";
            
            $nisn = $data['nisn'];
            $namadepan = $data['namadepan'];
            $namatengah = $data['namatengah'];
            $namabelakang = $data['namabelakang'];
            $namalengkap = $namadepan.' '.$namatengah.' '.$namabelakang;
            $kelasangkatan = $data['kelasangkatan'];
            $kelasjurusan = $data['kelasjurusan'];
            $kelasnomer = $data['kelasnomer'];
            $kelas = $kelasangkatan.' '.$kelasjurusan.' '.$kelasnomer;
            $jk = $data['jk'];
            $tempatlahir = $data['tempatlahir'];
            $tanggallahir = $data['tanggallahir'];
            $alamat = $data['alamat'];
            $namafotosiswa = $data['namafotosiswa'];
            $tmpfotosiswa = $data['tmpfotosiswa'];
            
            $model = new model;
            
            $model->insert("siswa", "'$nisn', '$namalengkap', '$kelas', '$tempatlahir', '$tanggallahir', '$jk', '$alamat','$nisn.jpg'");
            $model->insert("siswa_nama", "'', '$nisn','$namadepan', '$namatengah', '$namabelakang'");
            $model->insert("siswa_kelas", "'', '$nisn','$kelasangkatan', '$kelasjurusan', '$kelasnomer'");
            
            $tempdir = "../../assets/data/siswa/qrcode/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
            if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
                mkdir($tempdir);

            #parameter inputan
            $isi_teks = $nisn;
            $namafile = $nisn.'.jpg';
            $quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
            $ukuran = 5; //batasan 1 paling kecil, 10 paling besar
            $padding = 2;

            QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
            
            $path = "../../assets/data/siswa/".$nisn.".jpg";
            $default = "../../assets/images/default.jpg";
            
            if($namafotosiswa != null){
                move_uploaded_file($tmpfotosiswa, $path);
            }else{
                copy($default, $path);
            }
        }
    
        public function tampilpembayaran(){
            require_once '../../model/model.php';
            
            $model = new model;
            return $datapembayaran = $model->select("pembayaran");
        }
    
        public function tambahpembayaran($data){
            require_once '../../model/model.php';
            
            $namapembayaran = $data['namapembayaran'];
            $deskripsipembayaran = $data['deskripsipembayaran'];
            $totalpembayaran = $data['totalpembayaran'];
            $kelas = $data['kelas'];
            $jurusan = $data['jurusan'];
            $tanggalinput = date('Y-m-d');
            
            $k = count($kelas);
            $j = count($jurusan);
            
            $model = new model;
            $model->insert("pembayaran", "'','$namapembayaran','$deskripsipembayaran','$totalpembayaran','$tanggalinput'");
            
            $datap = $model->selectOrderBy("pembayaran", "id_pembayaran desc limit 1");
            $idpembayaran = $datap['0']['id_pembayaran'];
 
            for($x=0; $x<$k; $x++){
                $kls = $kelas[$x];
                for($y=0; $y<$j; $y++){
                    $jrsn = $jurusan[$y];
                    $datasiswa = $model->select2TableWhere(
                        "siswa", 
                        "siswa_kelas", 
                        "siswa.nisn = siswa_kelas.id_siswa", 
                        "siswa_kelas.kelas = '$kls' and siswa_kelas.jurusan = '$jrsn'"
                    );
                    
                    foreach($datasiswa as $datas){
                        $nisn = $datas['nisn'];
                        $model->insert("siswa_pembayaran", "'', '$nisn', '$idpembayaran', '$totalpembayaran'");
                    }
                }
            }
        }
    
        public function tampilpembayaransiswa(){
            require_once '../../model/model.php';
            
            $idpembayaran = $_GET['aaa'];
            
            $model = new model;
            return $datapembayaransiswa = $model->select3TableWhere("siswa_pembayaran", "siswa", "pembayaran", "siswa_pembayaran.pembayaran_idsiswa = siswa.nisn", "siswa_pembayaran.pembayaran_jenis = pembayaran.id_pembayaran", "pembayaran_jenis='$idpembayaran'");
        }
    
        public function tampildatapembayaran($data){
            require_once '../../model/model.php';
            
            $nisn = $data;
            
            $model = new model;
            return $model->select2TableWhere("siswa_pembayaran", "pembayaran", "siswa_pembayaran.pembayaran_jenis = pembayaran.id_pembayaran", "siswa_pembayaran.pembayaran_idsiswa = '$nisn'");
        }
        public function tampilprofilesiswa($data){
            require_once '../../model/model.php';
            
            $nisn = $data;
            
            $model = new model;
            return $model->selectWhere("siswa", "NISN = '$nisn'");
        }
    
        public function tampilpembayaranprofilesiswa($data){
            require_once '../../model/model.php';
            $nisn = $data;
            
            $model = new model;
            return $model->select2TableWhere("siswa_pembayaran", "pembayaran", "siswa_pembayaran.pembayaran_jenis = pembayaran.id_pembayaran", "pembayaran_idsiswa = '$nisn'");
        }
    
        public function updatePembayaran($data){
            require_once '../../model/model.php';
            
            $nisn = $data['nisn'];
            $idpembayaran = $data['idpembayaran'];
            $uangsiswa = $data['uangsiswa'];
            
            $model = new model;
            $old = $model->selectWhere("siswa_pembayaran", "pembayaran_idsiswa = '$nisn' and pembayaran_jenis = '$idpembayaran'");
            $sisapembayaran = $old['0']['pembayaran_sisa'];
            $sisapembayaranbaru = $sisapembayaran-$uangsiswa;
            $waktusekarang = date("Y-m-d h:i:sa");
            
            $new = $model->updateWhere("siswa_pembayaran", "pembayaran_sisa = '$sisapembayaranbaru'", "pembayaran_idsiswa = '$nisn' and pembayaran_jenis = '$idpembayaran'");
            
            $model->insert("transaksi", "'', '$waktusekarang', '$nisn', '$idpembayaran', '$sisapembayaran', '$sisapembayaranbaru', '$uangsiswa',  ''");
        }
    
        public function tampiltransaksi(){
            require_once '../../model/model.php';
            
            $model = new model;
            return $model->select3Table("transaksi", "pembayaran", "siswa", "transaksi.transaksi_idpembayaran = pembayaran.id_pembayaran", "transaksi.transaksi_idsiswa = siswa.nisn");
        }
}

?>