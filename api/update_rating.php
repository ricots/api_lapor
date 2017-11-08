<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_lapor = $_POST['id_lapor'];
		$rating = $_POST['rating'];
		
		require_once('dbConnect.php');
		
		$sql = "update pelaporan set rating = '$rating' where id_lapor = '$id_lapor'";
		
		
		if(mysqli_query($con,$sql)){
			echo "Successfully ";
		}else{
			echo "gagal";

		}
	}else{
echo 'error';
}

?>