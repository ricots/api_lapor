<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		$password = $_POST['password'];
		$nama = $_POST['nama'];
		$no_ktp = $_POST['no_ktp'];
		$alamat_user = $_POST['alamat_user'];
		
		require_once('dbConnect.php');
		
		$sql = "INSERT INTO user_lapor (no_ktp,nama,alamat_user,password) VALUES ('$no_ktp','$nama','$alamat_user','$password')";
		
		
		if(mysqli_query($con,$sql)){
			echo "Successfully Registered";
		}else{
			echo "Could not register";

		}
	}else{
echo 'error';
}

?>