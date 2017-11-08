<style type="text/css">
.mar-top{
	margin-top: 18px;
}
.col-dark{
	display: block;
    height: 1px;
    border: 0;
    border-top: 4px solid #ccc;
    margin: 1em 0;
    padding: 0; 
}
</style>
<div class="container">

	<!-- row -->
	<div class="row">
	    <div class="col-lg-12">
	      <h2>
	      	<i class="fa fa-tachometer  fa-fw"></i>
	      	<b>Control Panel</b>
	      </h2>

	      <hr class="col-dark">
	      	<div class="row">
	      		<?php  

		      	$sql = "SELECT COUNT(nama) FROM user_lapor ";
		      	$result = $koneksi->query($sql);
		      	$row = $result->fetch_array();
		      	$member = $row[0];

		      	?>
		      	<div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-aqua">
		            <div class="inner">
		              <h3><?php echo $member; ?></h3>

		              <p><b>Member</b></p>
		            </div>
		            <div class="icon mar-top">
		              <i class="fa fa-users"></i>
		            </div>
		            <a href="index.php?master=member" class="small-box-footer">Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		          <!-- ends small box -->
		        </div>
		        <!-- ends cols -->

		        <?php  

		      	$sql = "SELECT COUNT(id_lapor) FROM pelaporan";
		      	$result = $koneksi->query($sql);
		      	$row = $result->fetch_array();
		      	$pelaporan = $row[0];

		      	?>

		        <div class="col-lg-3 col-xs-6">
		          <!-- small box -->
		          <div class="small-box bg-yellow">
		            <div class="inner">
		              <h3><?php echo $pelaporan; ?></h3>

		              <p><b>Pelaporan</b></p>
		            </div>
		            <div class="icon mar-top">
		              <i class="fa fa-exclamation-triangle"></i>
		            </div>
		            <a href="index.php?master=pelapor" class="small-box-footer">Info Selanjutnya <i class="fa fa-arrow-circle-right"></i></a>
		          </div>
		          <!-- ends small box -->
		        </div>
		        <!-- ends cols -->

		    </div>
	      	<!-- ends row -->
	    </div>
	</div>
	<!-- end row -->
</div>