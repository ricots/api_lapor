<?php
include 'dbConnect.php';	
$sql = "select * from user_lapor where status ='0'";
$result = mysqli_query($con,$sql);
$number_of_rows = mysqli_num_rows($result);
$temp_array = array();

if($number_of_rows > 0){
while ($row = mysqli_fetch_assoc($result)){
array_push($temp_array,array(
"email"=>$row['email'],
"no_ktp"=>$row['no_ktp'],
 "nama"=>$row['nama'],
 "alamat_user"=>$row['alamat_user'],
 "status_email"=>$row['status_email']
 ));
}}
//var_dump($temp_array);
echo json_encode($temp_array);
 ?>