<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$id_lapor = $_POST['id_lapor'];
$no_ktp_rekomendasi = $_POST['no_ktp_rekomendasi'];
require_once('dbConnect.php');

 $sql = "INSERT INTO detail_rekomendasi (no_ktp_rekomendasi, id_lapor)
		SELECT * FROM (SELECT '$no_ktp_rekomendasi', '$id_lapor') AS tmp
		WHERE NOT EXISTS (
		    SELECT no_ktp_rekomendasi,id_lapor FROM detail_rekomendasi
		    	 	WHERE id_lapor = '$id_lapor' AND no_ktp_rekomendasi = '$no_ktp_rekomendasi'
		)";		

 $res = mysqli_query($con,$sql);

 if ($res) {
 	echo "Successfully";
 }else{
	echo "failed";
 }

}
		
		?>