<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php 
	$x = new distributor($db);
	//$f = $x -> fetch();
	$no = 1;


	if ($_GET['a']=='see') {
		$f = $x -> see($_GET['u']);
	}else{
		$f = $x -> fetch();	
	}
?>
<div class="bg-shadow"></div>
	<div class="col-md-12 form-action add">
		<div class="form-input">
			<div class="form-input-heading">
				<h1 class="title">Tambah Data Distributor</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=addDistributor">
					<table class="table table-center">
						<tr>
							<td>Nama Distributor</td>
							<td><input type="text" class="input-text" name="nmd"></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" class="input-text" name="almt"></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><input type="text" class="input-text" name="tlp"></td>
						</tr>
						<tr>
							<td><a class="btn btn-danger" onclick="closePopup()">Cancel</a></td>
							<td><input type="submit" class="btn btn-a" value="Add!" name=""></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-12 form-action edit" >
		<div class="form-input">
			<div class="form-input-heading">
				<h1 class="title">Ubah Data Buku</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=editDistributor">
					<table class="table table-center">
						<tr>
							<td>Nama Distributor</td>
							<td>
								<input type="text" class="input-text" name="nmd" id="nmd">
								<input type="text" name="i" id="i" hidden="hidden">
							</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td><input type="text" class="input-text" name="almt" id="almt"></td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td><input type="text" class="input-text" name="tlp" id="tlp"></td>
						</tr>
						<tr>
							<td><a class="btn btn-danger" onclick="closePopup()">Cancel</a></td>
							<td><input type="submit" class="btn btn-a" value="Edit!" name=""></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</div>


<div class="col-md-12">
	<div class="form-input">
		<div class="form-input-heading">
			<h1 class="title">Data Distributor</h1>
			<button class="btn btn-primary" onclick="addData()"><i class="fa fa-plus"></i> Add Buku</button>
			<br/><br/>
			<form method="POST" action="index.php?action=searchDistributor">
				<input type="text" class="input-text" placeholder="Nama Distributor.." name="a"><input type="SUBMIT" value="search" class="btn btn-primary" name="">
			</form>
		</div>
		<div class="form-input-body">
			<table id='tbl' class='table display datatable table-border'>
				<thead>
					<td>No</td>
					<td>Nama Distributor</td>
					<td>Alamat</td>
					<td>Telepon</td>
					<td width="60px;">Action</td>
				</thead>
				<tbody>
				<?php 
				if (empty($_GET['a']) || empty($_GET['u']) ) {
				foreach ($f as $data) { ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data['nama_distributor'] ?></td>
						<td><?php echo $data['alamat'] ?></td>
						<td><?php echo $data['telepon'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delDistributor&amp;i=<?php echo $data['id_distributor'] ?>"><i class="fa fa-trash"></i></a>
							<a class="btn btn-warning" onclick="editDistrb('<?php echo $data['nama_distributor'] ?>','<?php echo $data['alamat'] ?>','<?php echo $data['telepon'] ?>','<?php echo $data['id_distributor'] ?>')"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				<?php $no++; }
				}
				else{?>
				<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $f['nama_distributor'] ?></td>
						<td><?php echo $f['alamat'] ?></td>
						<td><?php echo $f['telepon'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delDistributor&amp;i=<?php echo $f['id_distributor'] ?>"><i class="fa fa-trash"></i></a>
							<a class="btn btn-warning" onclick="editDistrb('<?php echo $f['nama_distributor'] ?>','<?php echo $f['alamat'] ?>','<?php echo $f['telepon'] ?>','<?php echo $f['id_distributor'] ?>')"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				<?php }
				?>
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