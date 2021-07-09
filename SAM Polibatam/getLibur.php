<?php
	function isHoliday() {
		include 'koneksi.php';
		$currdate = date('Y-m-d');
		$querydate = "SELECT tanggal from tbl_hari_libur WHERE tanggal='$currdate';";

		$resultDate = mysqli_query($koneksi,$querydate);

		if(mysqli_num_rows($resultDate) < 1) {
     			return FALSE;
		}

		else {
			return TRUE;
		}
	}
?>
