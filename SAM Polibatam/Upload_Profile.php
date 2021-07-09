<?php
	include 'SimpleImage.php';
	include 'koneksi.php';

        $file = $_FILES["imageUpload"];
	$nnk = $_POST['nnk'];

        $ext = ".PNG";
        $target = "/var/www/html/profile_photos/".basename($_POST['nnk']).$ext;
	$url = "http://absen.polibatam.ac.id/sam_api/Image/profile_photos/".basename($_POST['nnk']).$ext;

        $uploaded_name = $file[ 'name' ];
        $uploaded_type = $file[ 'type' ];
        $uploaded_size = $file[ 'size' ];


        if( ( $uploaded_type == "image/jpeg" || $uploaded_type == "image/png" ) && ( $uploaded_size < 10000000 ) ) {
		$image = new SimpleImage();
    		$image->load($file['tmp_name']);
    		$image->resize(300, 300);
    		$image->save($target);

		if (mysqli_query($koneksi, "UPDATE tbl_user set foto_profile='$url' WHERE nim_nik_unit='$nnk';")) {
	                echo '<script>alert("Profile Image Changed Successfully!"); window.location.href="Profile.php";</script>';
		}

		else {
	                echo '<script>alert("Profile Image Failed to Change!"); window.location.href="Profile.php";</script>';
		}
        }

        else {
                echo  '<script>alert("Your image was not uploaded. We can only accept JPEG or PNG images."); window.location.href="Profile.php";</script>';
        }

?>
