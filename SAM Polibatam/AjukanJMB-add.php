<?php
include 'koneksi.php';

$id 				= rand(1,100000000);
$nim_nik_unit		= $_POST['nim'];
date_default_timezone_set('Asia/Jakarta');
$date 				= date('Y/m/d H:i:s', time());
$jam_masuk			= $_POST['jam_masuk'];
$jam_pulang			= $_POST['jam_pulang'];

if($jam_masuk != null && $jam_pulang != null){
	$query="INSERT INTO tbl_pengajuan_jmb SET id='$id', nim_nik_unit='$nim_nik_unit', tanggal_pengajuan='$date', jam_masuk='$jam_masuk', jam_pulang='$jam_pulang', isAccepted='0'";
	mysqli_query($koneksi, $query);

	header('Refresh:0.1; url=AjukanJMB.php');
    echo '<script>alert("Pengajuan Jam Merdeka Bekerja Berhasil!"); 
    window.location.href = "Profile.php";</script>';
} else{
	header('Refresh:0.1; url=AjukanJMB.php');
    echo '<script>alert("Pengajuan Gagal, Mohon Isi Data Dengan Lengkap!")</script>';
}
?>