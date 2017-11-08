<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//if($_SERVER['REQUEST_METHOD']=='POST'){
		$id_lapor= $_GET['id_lapor'];

include '../../Config/koneksi.php';

$sql = "update pelaporan set status='selesai' where id_lapor='$id_lapor'";
		
		$update = mysqli_query($koneksi,$sql); 
		header("Location:../index.php?master=pelapor");
 //var_dump($update);

$token= mysqli_query($koneksi,"SELECT DISTINCT id_lapor,no_ktp,judul,no_ktp,deskripsi,status,token FROM detail_pelaporannya WHERE id_lapor='PLO0001'");
		$ambil_token;
		while ($ambil_data = mysqli_fetch_array($token)) {
			$ambil_token = $ambil_data['token'];		
		}

		$url = 'https://fcm.googleapis.com/fcm/send';

			$msg = array
			(
				'body' 	=> 'laporan anda telah selesai di kerjakan',
				'title'		=> "LAPOR",
				'sound'		=> 'default'

				);
			$fields = array
			(
				'to' 	=> $ambil_token ,
				'notification'			=> $msg
				);


			$headers = array(
				'Authorization:key = AAAAU0qntms:APA91bEOsCn9LI7121abPE1x8kcmfNDNRU58F78sz8p4P5WndG6YK6Vcaks3rU83wBAOese4lMpdog4fO_gq-qt2_sYwitW69UB3LfGdSK1YeyODTXHP_S_aptBMGYtCtUEqRwwxwc3U',
				'Content-Type: application/json'
				);

		echo json_encode($fields );
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);  
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = curl_exec($ch);           
			if ($result === FALSE) {
				die('Curl failed: ' . curl_error($ch));
			}
			curl_close($ch);
			return $result;

			//}

?>