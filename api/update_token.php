<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		//Getting values 
		$no_ktp = $_POST['no_ktp'];
		$token = $_POST['token'];
		
		//importing database connection script 
		require_once('dbConnect.php');
		
		//Creating sql query 
		$sql = "update user_lapor set token='$token' where no_ktp='$no_ktp'";
		
		//Updating database table 
		if(mysqli_query($con,$sql)){
			echo 'sukses';
		}else{
			echo 'coba lagi';
		}
		
		//closing connection 
		mysqli_close($con);
}
?>