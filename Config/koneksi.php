<?php 

$host="localhost";
$user="mydb1675";
$pass="mydeveloper18";
$db="mydb1675_lapor_jalan";

$koneksi = new mysqli($host,$user,$pass,$db);

if ($koneksi->connect_errno) {
	die('koneksi error'. $koneksi->connect_errno);
}

 ?>