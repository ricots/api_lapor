<?php 

include '../../Config/koneksi.php';

$id	= $_GET['ambil_id_pelapor'];

$sql = "DELETE FROM pelaporan WHERE id_lapor = '$id'";
$koneksi->query($sql);

header("Location:../index.php?master=pelapor");

 ?>