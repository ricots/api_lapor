<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$id_lapor = $_POST['id_lapor'];
            
	//Importing database
	require_once('dbConnect.php');
	
	$sql1 = "select rating_rekom from pelaporan where id_lapor ='$id_lapor'";
  $result1 = mysqli_query($con,$sql1) or die (mysqli_error($con));  
 $row1 = mysqli_fetch_assoc($result1);
 $ranting1 = $row1['rating_rekom'];
$tambah_ranting = $ranting1 +1;
$update_ranting = "update pelaporan set rating_rekom = '$tambah_ranting' where id_lapor = '$id_lapor'";
 $update = mysqli_query($con,$update_ranting) or die (mysqli_error($con)); 
 var_dump($update);

 if(mysqli_query($con,$sql1)){
			echo "Successfully rating";
		}else{
			echo "Could not rating";

		}
	}else{
echo 'error';
}
?>