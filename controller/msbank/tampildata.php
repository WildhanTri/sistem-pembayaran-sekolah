<?php
include "msbank.php";
include "../../koneksi.php"; // Load file koneksi.php
$nisn = $_POST['nisn']; // Ambil data NIS yang dikirim lewat AJAX

$msbank = new msbank;
$datapembayaran = $msbank->tampildatapembayaran($nisn);
$query = mysqli_query($connect, "SELECT * FROM siswa WHERE nisn = '$nisn' "); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query
if($row > 0){ // Jika data lebih dari 0
  $data = mysqli_fetch_array($query); // ambil data siswa tersebut
  // BUat sebuah array
  $callback = array(
    'status' => 'success', // Set array status dengan success
    'nama_lengkap' => $data['nama_lengkap'], // Set array nama dengan isi kolom nama pada tabel siswa
    'kelas' => $data['kelas'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
    'tempatlahir' => $data['tempat_lahir'], // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
    'tanggalahir' => $data['tanggal_lahir'], // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
    'alamat' => $data['alamat'], // Set array jenis_kelamin dengan isi kolom alamat pada tabel siswa
    'foto' => $data['foto'],
    'pembayaran' => $datapembayaran
  );
}else{
  $callback = array('status' => 'failed'); // set array status dengan failed
}
echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>