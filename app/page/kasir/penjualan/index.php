<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php 
	$x = new pasok($db);
	$f = $x -> fetch();
	$d = $x -> fetchDis();
	$b = $x -> fetchBuk();
	$no = 1;
?>
<div class="bg-shadow"></div>
	<div class="col-md-12 form-action add">
		<div class="form-input">
			<div class="form-input-heading">
				<h1 class="title">Tambah Data Pasok</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=addPasok">
					<table class="table table-center">
						<tr>
							<td>Distributor</td>
							<td>
								<select class="input-text" name="d">
								<?php foreach ($d as $data) { ?>
									<option value="<?php echo $data['id_distributor'] ?>"><?php echo $data['nama_distributor'] ?></option>
								<?php }?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Buku</td>
							<td>
								<select class="input-text" name="b">
								<?php foreach ($b as $data) { ?>
									<option value="<?php echo $data['id_buku'] ?>"><?php echo $data['judul'] ?></option>
								<?php }?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td><input type="text" class="input-text" name="jml"></td>
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
				<h1 class="title">Ubah Data Pasok</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=editPasok">
					<table class="table table-center">
						<input type="text" hidden="hidden" name="i" id="i">
						<tr>
							<td>Distributor</td>
							<td>
								<select class="input-text" name="d" id="d">
								<?php foreach ($d as $data) { ?>
									<option value="<?php echo $data['id_distributor'] ?>"><?php echo $data['nama_distributor'] ?></option>
								<?php }?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Buku</td>
							<td>
								<select class="input-text" name="b" id="b">
								<?php foreach ($b as $data) { ?>
									<option value="<?php echo $data['id_buku'] ?>"><?php echo $data['judul'] ?></option>
								<?php }?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Jumlah</td>
							<td><input type="text" class="input-text" name="jml" id="j"></td>
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
			<h1 class="title">Data Pasokan</h1>
			<button class="btn btn-primary" onclick="addData()"><i class="fa fa-plus"></i> Add Buku</button>
		</div>
		<div class="form-input-body">
			<table id='tbl' class='table display datatable table-border'>
				<thead>
					<td>No</td>
					<td>Judul</td>
					<td>Distributor</td>
					<td>Jumlah</td>
					<td>Tanggal</td>
					<td width="60px;">Action</td>
				</thead>
				<tbody>
				<?php foreach ($f as $data) { ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data['judul'] ?></td>
						<td><?php echo $data['nama_distributor'] ?></td>
						<td><?php echo $data['jumlah'] ?></td>
						<td><?php echo $data['tanggal'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delPasok&amp;i=<?php echo $data['id_pasok'] ?>&amp;j=<?php echo $data['jumlah'] ?>"><i class="fa fa-trash"></i></a>
							<a class="btn btn-warning" onclick="editPasok('<?php echo $data['id_buku'] ?>','<?php echo $data['id_distributor'] ?>','<?php echo $data['jumlah'] ?>','<?php echo $data['id_pasok'] ?>')"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				<?php $no++; }?>
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