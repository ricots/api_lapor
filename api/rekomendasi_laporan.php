<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-type:application/json");

require_once('dbConnect.php');  


function getJumlahRekomen($con,$id) {
  	$sql = "SELECT Count(no_ktp_rekomendasi) AS jumlah FROM detail_rekomendasi  where id_lapor='$id'";
  	$result = mysqli_query($con, $sql);
  	$nilai;
  	while ($row = mysqli_fetch_assoc($result)) {
  		$nilai = $row['jumlah'];
  	}
  	return $nilai;
 }  


$query = "SELECT sum(rating) as rating, 
				 rating_rekom, 
				 id_lapor,
				 judul,
				 alamat,
				 deskripsi,
				 gambar,
				 status,
				 lat,
				 lng,
				 jumlah_laporan 
				 from sum_rating,
				 	  total_lapor
				 where status ='proses' 
				 group by judul 
				 order by rating desc";


//$total_data_limit = mysqli_num_rows(mysqli_query($con, $query));
$result = mysqli_query($con, $query);
$number_of_rows = mysqli_num_rows($result);
$resource = array(); 
if($number_of_rows > 0){
while ($row = mysqli_fetch_assoc($result)) {

	$jumlah_lapor = $row['jumlah_laporan'];
	$rating = $row['rating'];
	$rumus = 100;
	$max = 10;
	$max_b = 1;
	$jumlah_rekom = $row['rating_rekom'];
	$id_laporan = $row['id_lapor'];

	$rekomen = getJumlahRekomen($con,$row['id_lapor']);   

	$get_atas  = $jumlah_lapor * $rating * $rumus;
	$get_bawah = $max * $max_b;
	$hasil	   = $get_atas / $get_bawah;

	if ($rekomen == 0) {
        $rekomendasi = "0";
    } else {
	$rekomendasi = $hasil / $rekomen;   

	
}
    array_push($resource, 
    	array(
			 "id_lapor"=>$row['id_lapor'],
			 "judul"=>$row['judul'],
			 "alamat"=>$row['alamat'],
			 "deskripsi"=>$row['deskripsi'],
			 "gambar"=>$row['gambar'],
			 "rating"=>$row['rating'],
			 "rating_rekom"=>$row['rating_rekom'],
			 "status"=>$row['status'],
			 "jumlah_laporan"=>utf8_encode($row['jumlah_laporan']),
			 "lat"=>$row['lat'],
			 "lng"=>$row['lng'],
             "rekomendasi"=>(string)$rekomendasi,
             "jumlah_rekomendasi"=>$rekomen
             )
		);
}
}

echo json_encode($resource);

?>