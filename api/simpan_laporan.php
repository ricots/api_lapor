<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$gambar= $_POST['gambar'];
                $judul = $_POST['judul'];
                $deskripsi = $_POST['deskripsi'];
                $alamat = $_POST['alamat'];
                $lat = $_POST['lat'];
                $lng = $_POST['lng'];
                $status = $_POST['status'];
                $no_ktp = $_POST['no_ktp'];
                $kode = '';
		
		require_once('dbConnect.php'); 

		$no = mysqli_query($con,"select * from pelaporan order by id_lapor desc limit 0,1");
$no_excute = mysqli_fetch_array($no);
$kodeawal=substr($no_excute['id_lapor'],3,4)+1;
 if($kodeawal<10){
  $kode='PLO000'.$kodeawal;
 }elseif($kodeawal > 9 && $kodeawal <=99){
  $kode='PLO00'.$kodeawal;
 }else{
  $kode='PLO00'.$kodeawal;
 }
		
		$sql ="SELECT id_lapor FROM pelaporan ORDER BY id_lapor ASC";
		
		$res = mysqli_query($con,$sql);

		$now=DateTime::createFromFormat('U.u', microtime(true));
		$id =$now->format('YmdHisu');

		while($row = mysqli_fetch_array($res)){
				$id_lapor = $row['id_lapor'];
		}
		
		$path = "gambar/$id.jpg";
		
		$actualpath = "http://mydeveloper.id/lapor_malang/$path";
		
		$sql = "INSERT INTO pelaporan (id_lapor,no_ktp,judul,deskripsi,gambar,alamat,lat,lng,status) VALUES ('$kode','$no_ktp','$judul','$deskripsi','$actualpath','$alamat','$lat','$lng','')";
		
		if(mysqli_query($con,$sql)){
			echo "base 64nya adalah : " +$image;
			file_put_contents($path,base64_decode($gambar));
			echo "Successfully Uploaded";
		}
		
		mysqli_close($con);
	}else{
		echo "Error";
	}

/*$judul = $_POST['judul'];
                $deskripsi = $_POST['deskripsi'];
                $alamat = $_POST['alamat'];
                $lat = $_POST['lat'];
                $lng = $_POST['lng'];
                $status = $_POST['status'];
                $email = $_POST['email'];
                $kode = '';
		
		require_once('dbConnect.php');

		$no = mysqli_query($con,"select * from pelaporan order by id_lapor desc limit 0,1");
$no_excute = mysqli_fetch_array($no);
$kodeawal=substr($no_excute['id_lapor'],3,4)+1;
 if($kodeawal<10){
  $kode='PLO000'.$kodeawal;
 }elseif($kodeawal > 9 && $kodeawal <=99){
  $kode='PLO00'.$kodeawal;
 }else{
  $kode='PLO00'.$kodeawal;
 }

	if(isset($_POST['gambar'])){
		$now=DateTime::createFromFormat('U.u', microtime(true));
		$id=$now->format('YmdHisu');
		
		$upload_folder="gambar";
		$path="$upload_folder/$id.jpg";
		$url="http://mydeveloper.id/";
		
		$gambar=$_POST['gambar'];
		$lembur=0;
		
		if(file_put_contents($path, base64_decode($gambar))!=false){
			echo "Upload success";
			$query="INSERT INTO pelaporan (id_lapor,email,judul,deskripsi,gambar,alamat,lat,lng,status) VALUES ('$kode','$email','$judul','$deskripsi','$actualpath','$alamat','$lat','$lng','')";
			$result=$con->query($query);
			if($result){
				echo "Update success";
			}else{
				echo "Update failed";
			}
			exit;
		}else{
			echo "Upload failed";
			exit;
		}
		
	
	}*/

?>		