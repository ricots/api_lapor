<?php
define('HOST','localhost');
	define('USER','mydb1675');
	define('PASS','mydeveloper18');
	define('DB','mydb1675_lapor_jalan');
	//define("GOOGLE_API_KEY", "AIzaSyCY-hGKLInRbx0-hJ4yLnbmxjdRIIxa1dg");
	$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
?>	