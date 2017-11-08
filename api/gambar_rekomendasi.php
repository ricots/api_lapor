<?php 
$id_lapor = $_GET['id_lapor'];
	
	//Importing database
	require_once('dbConnect.php');
	
	/*$sql1 = "select rating from pelaporan where id_lapor ='$id_lapor'";
  $result1 = mysqli_query($con,$sql1) or die (mysqli_error($con));  
 $row1 = mysqli_fetch_assoc($result1);
 $ranting1 = $row1['rating'];
$tambah_ranting = $ranting1 +1;
$update_ranting = "update pelaporan set rating = '$tambah_ranting' where id_lapor = '$id_lapor'";
 $update = mysqli_query($con,$update_ranting); */

	//Creating sql query with where clause to get an specific employee
	$sql = "SELECT * FROM pelaporan,total_lapor where status = 'proses' ORDER BY rating_rekom DESC LIMIT 3";
	
	$result = mysqli_query($con,$sql);
$number_of_rows = mysqli_num_rows($result);
$temp_array = array();

if($number_of_rows > 0){
while ($row = mysqli_fetch_assoc($result)){
array_push($temp_array,array(
"id_lapor"=>$row['id_lapor'],
 "gambar"=>$row['gambar'],
 "jumlah_laporan"=>$row['jumlah_laporan'],
 "rating_rekom"=>$row['rating_rekom']
 ));
}}
 echo json_encode($temp_array);

?>