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


if($result->status == "success")  {
	foreach ($array as $val){
    		$nama = $val['name'];
    		$nim_nik_unit = $val['nim_nik_unit'];
    		$jabatan = $val['jabatan'];
    		$username = $val['username'];
    		$email = $val['email'];
    		$id = $val['id'];
   	}


    	$_SESSION['nama-user'] = $nama;
    	$_SESSION['user'] = true;
    	$_SESSION['nim_nik_unit-user'] = $nim_nik_unit;
    	$_SESSION['jabatan-user'] = $jabatan;
    	$_SESSION['username-user'] = $username;
    	$_SESSION['email-user'] = $email;
    	$_SESSION['id-user'] = $id;

    	include 'koneksi.php';
    	include 'HeaderAdd.php';
    	$query="INSERT INTO `tbl_user` (`nim_nik_unit`, `username`, `name`, `email`, `jabatan`, `alamat`, `foto_profile`, `address_latitude`, `address_longitude`, `jam_masuk`, `jam_pulang`) VALUES ('$nim_nik_unit', '$username', '$nama', '$email', '$jabatan', NULL, 'http://absen.polibatam.ac.id/sam_api/Image/profile_photos/people.png', NULL, NULL, NULL, NULL)";

    	if(mysqli_query($koneksi, $query)) {
		addHeader($nim_nik_unit);
    	}

	header('Location: Home.php');
}

else {
    $_SESSION['message'] = $array['message'];
    $_SESSION['status'] = $array['status'];
    header('Location: index.php');
}
?>
