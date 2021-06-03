<?php

include "../koneksi.php";


$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT isAccepted from tbl_izin WHERE id_header='$id' ");

foreach($query as $row){
    $idApprove = $row['isAccepted'];
}
//echo $idApprove;

if($idApprove == '0' || $idApprove == '2'){
    mysqli_query($koneksi,"UPDATE tbl_izin SET isAccepted='1' WHERE id_header='$id'");
    header('Refresh:0.1; url=../ApprovalIzin.php');
    echo '<script>alert("Izin Sudah Disetujui")</script>';
}else{
    header('Refresh:0.1; url=../ApprovalIzin.php');
    echo '<script>alert("Izin Sudah Disetujui Sebelumnya")</script>';
}




?>