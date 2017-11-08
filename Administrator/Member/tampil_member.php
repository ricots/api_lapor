<?php 

include '../Config/koneksi.php';

$sql = "SELECT * FROM user_lapor";
$result=$koneksi->query($sql);

//no
$n = 1 ;

?>

<div class="container col-md-12">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-tittle"><b>Daftar Member</b></h3>
		</div>

	<div class="panel-body table-responsive">
		<?php 
			if($row = $result->num_rows<=0){
				 echo 'Data Tidak tersedia'; 
			} 
		 ?>
		<table id="table-data" class="table table-bordered table-striped table-hover">
			<thead>
				<th>No</th>
				<th>No KTP</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Aksi</th>
			</thead>

			<tbody>
				<?php while ($row = $result->fetch_object()) { ?>
				<tr>
					<td><?php echo $n++."." ?></td>
										<td><?php echo $row->no_ktp; ?></td>
					<td><?php echo $row->nama; ?></td>
					<td><?php echo $row->alamat_user; ?></td>
					<td><a href="Member/hapus_member.php?ambil_id_member=<?php echo $row->no_ktp; ?>" onClick="return confirm('Data Akan Dihapus !')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a></td>
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
            { orderable: true, targets: '_all' }
        ]
    } );
});
</script>