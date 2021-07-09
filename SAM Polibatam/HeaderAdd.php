<?php

	function addHeader($nim_nik_unit) {

		include 'koneksi.php';
		include 'getLibur.php';

		$alpha = 'Alpha';
		$libur = 'Libur';

		$dateformatted = date("Y-m-d");
		$dateunformatted = date("Ymd");

		$dayname = array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
		$dayofweek = date("w");
		$currday = $dayname[$dayofweek];
		$unit = $nim_nik_unit;

		$headerID = $nim_nik_unit . "-" . $dateunformatted;
		$insert1 = "INSERT INTO tbl_absen_header (id,nim_nik_unit,hari,tanggal_absen,status) VALUES ('$headerID', '$unit', '$currday', '$dateformatted', '$alpha')";
		$insert2 = "INSERT INTO tbl_absen_header (id,nim_nik_unit,hari,tanggal_absen,status) VALUES ('$headerID', '$unit', '$currday', '$dateformatted', '$libur')";

		if ($dayofweek == 0 || $dayofweek == 6 || isHoliday() === TRUE) {
			if (mysqli_query($koneksi,$insert2)) {
				// echo "<script>console.log('Header Creation Successfull!')</script>";
				echo "<html>Header Creation Successfull!</html>";
			}

			else {
				echo "<html>Header Creation Failed!</html>";
				// echo "<script>console.log('Header Creation Failed!')</script>";
			}
		}

		else {
			if (mysqli_query($koneksi, $insert1)) {
				echo "<html>Header Creation Successfull!</html>";
				// echo "<script>console.log('Header Creation Successfull!')</script>";
			}

			else {
				echo "<html>Header Creation Failed!</html>";
				// echo "<script>console.log('Header Creation Failed!')</script>";
			}
		}

		$koneksi->close();
	}
?>




