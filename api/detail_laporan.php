<?php 
	$id_lapor = $_GET['id_lapor'];

	

	//Importing database

	require_once('dbConnect.php');

	

	//Creating sql query with where clause to get an specific employee

	$sql = "SELECT * FROM pelaporan WHERE id_lapor='$id_lapor'";

	

	$result = mysqli_query($con,$sql);

$number_of_rows = mysqli_num_rows($result);

$temp_array = array();



if($number_of_rows > 0){

while ($row = mysqli_fetch_assoc($result)){

array_push($temp_array,array(
"id_lapor"=>$row['id_lapor'],
"deskripsi"=>$row['deskripsi'],
"gambar"=>$row['gambar'],
"lat"=>$row['lat'],
 "lng"=>$row['lng']

 ));

}}

 echo json_encode($temp_array);

?>