<div class="container col-md-12">
	<!-- panel -->
	<div class="panel panel-default">
		<!-- panel heading -->
		<div class="panel-heading">
			<h3 class="panel-tittle"><b>Maps</b></h3>
		</div>
		<!-- end panel heading -->

		<!-- panel body -->
		<div class="panel-body">

			<!-- maps -->
			<div id="googleMap" style="width:100%;height:400px;"></div>
			
		</div>
		<!-- end panel body -->
	</div>
	<!-- end panel -->
</div>

<?php 

// include '../Config/koneksi.php';

// $sql = "SELECT alamat, lat, lng FROM pelaporan WHERE status='proses'";
// $result = $koneksi->query($sql);
// $data = array();

// while ($row = $result->fetch_assoc()) {
// 	$data []= array(
// 		"alamat"=>$row['alamat'],
// 		"lat"=>$row['lat'],
// 		"lng"=>$row['lng']
// 		);
// }

// var_dump($data);

 ?>

 <script>
        
    var marker;
      function initialize() {
          
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
            $query = mysqli_query($koneksi,"SELECT alamat, lat, lng FROM pelaporan WHERE status='proses'");
            while ($data = mysqli_fetch_array($query))
            {
                $alamat = $data['alamat'];
                $lat = $data['lat'];
                $lng = $data['lng'];
                
                echo ("addMarker($lat, $lng, '<b>$alamat</b>');\n");                        
            }
          ?>
          
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>

<!-- <script>
function myMap() {
	  // get id 
	  var mapCanvas = document.getElementById("googleMap");

	  // set LatLng (Malang)
	  var myCenter = new google.maps.LatLng(-7.9666,112.6326); 

	  // set zoom
	  var mapOptions = {center: myCenter, zoom: 7};
	  var map = new google.maps.Map(mapCanvas,mapOptions);
	  var marker = new google.maps.Marker({
	  				position: myCenter
	  			});
	  
	  // add marker
	  marker.setMap(map);
}
</script> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1JuL6Rq5rIp65eOde2mBngeVlLr8lqEg&callback=initialize"></script>