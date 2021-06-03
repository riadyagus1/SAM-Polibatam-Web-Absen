<?php
include '../koneksi.php';
$id = $_GET['id'];

$query="DELETE from tbl_izin WHERE id_header='$id'";
mysqli_query($koneksi, $query);

header("location:../ApprovalIzin.php")
?>