<?php 
session_start();

include 'Config/koneksi.php';

$user = $_POST['user'];
$pass = $_POST['password'];

 $sql = "SELECT * FROM admin WHERE user='$user' AND kata_sandi='$pass'";
 $result = $koneksi->query($sql);
 $row = $result->num_rows;

 if($row==TRUE){
	$_SESSION['user']=$user;
	header("location:Administrator/index.php");
}else{
	header("location:gagal_login.php");
}


 ?>