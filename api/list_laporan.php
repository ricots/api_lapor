<?php
$id_lapor = $_POST['id_lapor'];
require_once('dbConnect.php');  
  
 
$page = $_GET['page'];
    $total_data = mysqli_num_rows(mysqli_query($con, "SELECT id_lapor from pelaporan"));
    //$start = 0;
    $limit = 5;
    $page_limit = $total_data/$limit;
    $page_limit_ceil = ceil($page_limit);
    if ($page <= $page_limit_ceil){
        $start = ($page - 1)*$limit;
 
        $query = "SELECT sum(rating) as rating, id_lapor,judul,alamat,deskripsi,gambar,status,lat,lng from sum_rating where status ='proses' group by id_lapor order by rating desc limit $start, $limit";
        $total_data_limit = mysqli_num_rows(mysqli_query($con, $query));
        if ($total_data_limit = 5) {
            $result = mysqli_query($con, $query);
            $resource = array();
 
            while ($row = mysqli_fetch_array($result)) {
                array_push($resource, array(
 "id_lapor"=>$row['id_lapor'],
 "judul"=>$row['judul'],
 "alamat"=>$row['alamat'],
 "deskripsi"=>$row['deskripsi'],
 "gambar"=>$row['gambar'],
 "rating"=>$row['rating'],
 "status"=>$row['status'],
  "lat"=>$row['lat'],
  "lng"=>$row['lng'])
 );
            }
             echo json_encode($resource);
            mysqli_close($con);
        }
    }
 
    else {
        echo "Data has been end.";
    }
?>