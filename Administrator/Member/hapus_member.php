<?php 

include '../../Config/koneksi.php';

$email	= $_GET['ambil_id_member'];

$sql = "DELETE FROM user_lapor WHERE no_ktp = '$email'";
$koneksi->query($sql);

header("Location:../index.php?master=member");

 ?>