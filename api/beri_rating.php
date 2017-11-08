<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		$no_ktp_rating = $_POST['no_ktp_rating'];
		$id_lapor = $_POST['id_lapor'];
		$rating = $_POST['rating'];
		
		require_once('dbConnect.php');
		
		$sql = "INSERT INTO detail_rating (id_lapor,no_ktp_rating,rating) VALUES ('$id_lapor','$no_ktp_rating',$rating)";
		
		
		if(mysqli_query($con,$sql)){
			echo "Successfully Registered";
		}else{
			echo "Could not register";

		}
	}else{
echo 'error';
}

?>