<?php
include 'koneksi.php';

$id 			= rand(1,100000000);
$nama			= $_POST['nama'];
$nim_nik_unit	= $_POST['nim'];
date_default_timezone_set('Asia/Jakarta');
$date 			= date('Y/m/d H:i:s', time());
$lat			= $_POST['lat'];
$lng			= $_POST['lng'];
$address		= $_POST['address'];

if($lat != null && $lng != null && $address != null){
	$query="INSERT INTO tbl_pengajuan_alamat SET id='$id', nim_nik_unit='$nim_nik_unit', tanggal_pengajuan='$date', alamat='$address', isAccepted='0', latitude='$lat', longitude='$lng'";
	mysqli_query($koneksi, $query);

	header('Refresh:0.1; url=LokasiWFH.php');
    echo '<script>alert("Pengajuan Lokasi WFH Berhasil"); 
    window.location.href = "Profile.php";</script>';
} elseif ($lat != null && $lng != null && $address == null) {
	$query="INSERT INTO tbl_pengajuan_alamat SET id='$id', nim_nik_unit='$nim_nik_unit', tanggal_pengajuan='$date', alamat='Rumah $nama', isAccepted='0', latitude='$lat', longitude='$lng'";
	mysqli_query($koneksi, $query);

	header('Refresh:0.1; url=LokasiWFH.php');
    echo '<script>alert("Pengajuan Lokasi WFH Berhasil"); 
    window.location.href = "Profile.php";</script>';
} else{
	header('Refresh:0.1; url=LokasiWFH.php');
    echo '<script>alert("Pengajuan Lokasi Gagal, Mohon Pilih Lokasi Terlebih Dahulu")</script>';
}
?>