<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php 
	$x = new kasir($db);
	//$f = $x -> fetch();
	$no = 1;

	if ($_GET['a']=='see') {
		$f = $x -> see($_GET['u']);
	}else{
		$f = $x -> fetchReport();	
	}
?>

<div class="col-md-12">
	<div class="form-input">
		<div class="form-input-heading">
			<h1 class="title">Data Penjualan</h1>
			<br/><br/>
			<form method="POST" action="index.php?action=searchReportKasir">
				<input type="text" class="input-text" placeholder="judul.." name="a"><input type="SUBMIT" value="search" class="btn btn-primary" name="">
			</form>
		</div>
		<div class="form-input-body">
			<table id='tbl' class='table display datatable table-border'>
				<thead>
					<td>No</td>
					<td>Kasir</td>
					<td>Total</td>
					<td>Tanggal</td>
					<td width="60px;">Action</td>
				</thead>
				<tbody>
				<?php
				if (empty($_GET['a']) || empty($_GET['u']) ) {
				foreach ($f as $data) { ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data['nama'] ?></td>
						<td>Rp.<?php echo number_format($data['total']) ?>.000,-</td>
						<td><?php echo $data['tanggal'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delReport&amp;i=<?php echo base64_encode($data['id_laporan']) ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php $no++; }

				}else{
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $f['nama'] ?></td>
						<td>Rp.<?php echo number_format($f['total']) ?>.000,-</td>
						<td><?php echo $f['tanggal'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delReport&amp;i=<?php echo base64_encode($data['id_laporan']) ?>"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				<?php }?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src='<?php echo __JS__ ?>jquery.min.js'></script>
<script type="text/javascript" src='<?php echo __JS__ ?>datatables/datatables.min.js'></script>
<script>
$(document).ready(function() {
    $('#tbl').DataTable();
} );
</script>