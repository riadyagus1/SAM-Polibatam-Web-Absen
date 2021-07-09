<?php
	include 'koneksi.php';

	session_start();
	$dateNow = date('Y/m/d');
	$dateNowStrip = date('Y-m-d');
	$dateNoFormat = date('Ymd');
	$token = "imsLKICAxlFhEOkbxeO8bbQu2LE44zVf";
	$status = "pulang";
	$headerID = $_SESSION['nim_nik_unit-user'].'-'.$dateNoFormat;
	$currTime = date('H:i:s');
	$currLoc = $_COOKIE['currAddr'];
	$absenString = $_COOKIE['AbsenString'];
	$fotoPulang = "https://absen.polibatam.ac.id/sam_api/buktiAbsen/keluar/".$_SESSION['nim_nik_unit-user']."-".$dateNowStrip."-".$status.".PNG";
	$reportPulang = $_COOKIE['report'];

	$data = array(
		"noldap" => $_SESSION['id-user'],
		"token" => sha1($dateNow.'+'.$token.'+'.$status)
	);

	$cleanImg = str_replace('data:image/jpeg;base64,','',$_POST['imageSrc']);

	$url = curl_init('http://sid.polibatam.ac.id/apilogin/web/api/auth/kirimabsenpulang');
	curl_setopt($url, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($url, CURLOPT_POSTFIELDS, $data);
	curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
	$result = json_decode(curl_exec($url));


	if ($result->status == "success") {
		$target = "/var/www/html/buktiAbsen/pulang/".basename($_SESSION['nim_nik_unit-user']."-".$dateNowStrip."-".$status).".PNG";

		$imageString = base64_decode($cleanImg);
		$imageCreate = imageCreateFromString($imageString);
		imagepng($imageCreate, $target, 0);

		$currStatus = mysqli_fetch_array(mysqli_query($koneksi, "SELECT status from tbl_absen_header where id='$headerID';"));
		if ($currStatus[0] == "Alpha") {
			if (mysqli_query($koneksi, "INSERT into tbl_absen_keluar(id_header, jam_keluar, lokasi_keluar, bukti_foto_keluar, report) VALUES ('$headerID','$currTime','$currLoc','$fotoPulang','$reportPulang');")) {
				if (mysqli_query($koneksi, "UPDATE tbl_absen_header set status='Kurang' where id='$headerID';")) {
					echo '<script>alert("Absen Pulang Sukses!"); window.location.href = "Home.php";</script>';
				}

				else {
					echo '<script>alert("Absen Pulang Gagal!"); window.location.href = "Home.php";</script>';
				}
			}

			else {
					echo '<script>alert("Absen Pulang Gagal!"); window.location.href = "Home.php";</script>';
			}
		}

		elseif ($currStatus[0] == "Kurang") {
			if (mysqli_query($koneksi, "INSERT into tbl_absen_keluar(id_header, jam_keluar, lokasi_keluar, bukti_foto_keluar, report) VALUES ('$headerID','$currTime','$currLoc','$fotoPulang', '$reportPulang');")) {
				if (mysqli_query($koneksi, "UPDATE tbl_absen_header set status='$absenString' where id='$headerID';")) {
					echo '<script>alert("Absen Pulang Sukses!"); window.location.href = "Home.php";</script>';
				}

				else {
					echo '<script>alert("Absen Pulang Gagal!"); window.location.href = "Home.php";</script>';
				}
			}

			else {
					echo '<script>alert("Absen Pulang Gagal!"); window.location.href = "Home.php";</script>';
			}
		}

		else {
			echo '<script>alert("Absen Pulang Gagal!"); window.location.href = "Home.php";</script>';
		}
	}

	else {
		echo '<script>alert("Absen Pulang Gagal!"); window.location.href = "Home.php";</script>';
	}
?>
