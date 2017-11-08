<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
 $no_ktp = $_POST['no_ktp'];
 $password = $_POST['password'];
 
 //Creating sql query
 $sql = "select * from user_lapor where no_ktp='$no_ktp' and password='$password'";
 
require_once('dbConnect.php');

 
 //executing query
 $result = mysqli_query($con,$sql);
 
 //fetching result
 $check = mysqli_fetch_array($result);
 
 //if we got some result 
 if(isset($check)){
 //displaying success 
 echo "success";
 }else{
 //displaying failure
 echo "failure";
 }
// mysqli_close($con);
 }
 ?>