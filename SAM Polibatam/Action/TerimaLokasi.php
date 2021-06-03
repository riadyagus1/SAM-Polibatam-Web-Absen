<?php

include "../koneksi.php";


$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT isAccepted from tbl_pengajuan_alamat WHERE nim_nik_unit='$id' ");

foreach($query as $row){
    $idApprove = $row['isAccepted'];
}
//echo $idApprove;

if($idApprove == '0' || $idApprove == '2'){
    mysqli_query($koneksi,"UPDATE tbl_pengajuan_alamat SET isAccepted='1' WHERE nim_nik_unit='$id'");
    header('Refresh:0.1; url=../ApprovalLokasi.php');
    echo '<script>alert("Lokasi Sudah Disetujui")</script>';
}else{
    header('Refresh:0.1; url=../ApprovalLokasi.php');
    echo '<script>alert("Lokasi Sudah Disetujui Sebelumnya")</script>';
}




?>