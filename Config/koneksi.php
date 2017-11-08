<?php 

$host="localhost";
$user="";
$pass="";
$db="mydb1675_lapor_jalan";

$koneksi = new mysqli($host,$user,$pass,$db);

if ($koneksi->connect_errno) {
	die('koneksi error'. $koneksi->connect_errno);
}

 ?>