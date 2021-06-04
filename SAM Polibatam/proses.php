<?php
session_start();
error_reporting(E_ALL ^ E_WARNING); 
$data = array(
    "username"      => $_POST['username'],
    "password"      => $_POST['password'],
    "token"         => "imsLKICAxlFhEOkbxeO8bbQu2LE44zVf"
);
$ch = curl_init('http://sid.polibatam.ac.id/apilogin/web/api/auth/login');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch));
$array = json_decode(json_encode($result), true);

foreach ($array as $val){
    $nama = $val['name'];
    $nim_nik_unit = $val['nim_nik_unit'];
    $jabatan = $val['jabatan'];
    $username = $val['username'];
    $email = $val['email'];
}

echo "<pre>";
print_r($array);
echo "</pre>";

echo "Status    : ".$array['status'].'<br>';
echo "Message   : ".$array['message'].'<br>';
echo "Nama : ".$nama.'<br>';

if($result->status == "success") {
	// session_start();
    //$_SESSION['username'] = $username; 
    $_SESSION['nama'] = $nama;
    $_SESSION['login'] = true;
    $_SESSION['nim_nik_unit'] = $nim_nik_unit;
	// $_SESSION['jabatan'] = $jabatan;

    include 'koneksi.php';
    $query="INSERT INTO `tbl_user` (`nim_nik_unit`, `username`, `name`, `email`, `jabatan`, `alamat`, `foto_profile`, `address_latitude`, `address_longitude`) VALUES ('$nim_nik_unit', '$username', '$nama', '$email', '$jabatan', '', 'http://absen.polibatam.ac.id/sam_api/Image/profile_photos/220315.PNG', NULL, NULL)";
    mysqli_query($koneksi, $query);

    header('Location: Home.php');
}
else {
    $_SESSION['message'] = $array['message'];
    $_SESSION['status'] = $array['status'];
    //echo "<script> alert('password salah');</script>";
    header('Location: index.php');
    } 
?>
