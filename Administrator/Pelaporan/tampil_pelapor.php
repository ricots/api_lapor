<?php 

include '../Config/koneksi.php';

$sql = "SELECT * FROM pelaporan";
$result=$koneksi->query($sql);

//no
$n = 1 ;

?>

<div class="container col-md-12">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-tittle"><b>Daftar Pelaporan</b></h3>
		</div>

	<div class="panel-body table-responsive">
		<table id="table-data" class="table table-bordered table-striped table-hover">
			<thead>
				<th>No</th>
				<th>Judul</th>
				<th>Deskripsi</th>
				<th>Alamat</th>	
				<th>Status</th>
				<th>Pesan</th>
				<th>Aksi</th>
			</thead>

			<tbody>
				<?php while ($row = $result->fetch_object()) { ?>
				<tr>
					<td><?php echo $n++."." ?></td>
					<input type="hidden" name="idlapor" value="<?php echo $row->id_lapor; ?>">
					<td><?php echo $row->judul; ?></td>
					<td><?php echo $row->deskripsi; ?></td>
					<td><?php echo $row->alamat; ?></td>
					<td>
						<!-- set color -->
						<a href="Pelaporan/acc_proses.php?ambil_id_pelapor=<?php echo $row->id_lapor; ?>" class=" btn <?php echo (empty($row->status))?" btn-warning":" btn-success disabled"; ?> ">
							<!-- icon -->
							<i class="fa <?php echo (empty($row->status))?" fa-exclamation-circle":" fa-check-circle"; ?>"></i>
							<!-- set value -->
							<?php echo (empty($row->status))?"Konfimasi":"ACC"; ?>
						</a>
					</td>
					<td><a href="Pelaporan/kirim_pesan.php?id_lapor=<?php echo $row->id_lapor; ?>" class="fa"><i class="fa-exclamation-circle":" fa-check-circle"></i>PESAN</a></td>
					<td><a href="Pelaporan/hapus_pelapor.php?ambil_id_pelapor=<?php echo $row->id_lapor; ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>

</div>

</div>

<script>
  $(document).ready(function(){
    $('#table-data').DataTable({
        rowReorder: true,
        columnDefs: [
            { orderable: false, className: 'reorder', targets: 5 },
            { orderable: false, className: 'reorder', targets: 6 },
            { orderable: false, className: 'reorder', targets: 7 },
            { orderable: true, targets: '_all' }
        ]
    } );
});
</script>