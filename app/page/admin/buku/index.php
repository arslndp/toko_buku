<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php 
	$x = new buku($db);
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
				<h1 class="title">Tambah Data Buku</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=addBuku">
					<table class="table table-center">
						<tr>
							<td>Judul</td>
							<td><input type="text" class="input-text" name="jdl"></td>
						</tr>
						<tr>
							<td>No Isbn</td>
							<td><input type="text" class="input-text" name="isb"></td>
						</tr>
						<tr>
							<td>Penulis</td>
							<td><input type="text" class="input-text" name="pnls"></td>
						</tr>
						<tr>
							<td>Penerbit</td>
							<td><input type="text" class="input-text" name="pnrbt"></td>
						</tr>
						<tr>
							<td>Tahun</td>
							<td><input type="text" class="input-text" name="thn"></td>
						</tr>
						<tr>
							<td>Harga Pokok</td>
							<td><input type="text" class="input-text" name="hrgpkp"></td>
						</tr>
						<tr>
							<td>Harga Jual</td>
							<td><input type="text" class="input-text" name="hrgjl"></td>
						</tr>
						<tr>
							<td>Ppn</td>
							<td><input type="text" class="input-text" name="ppn"></td>
						</tr>
						<tr>
							<td>Diskon</td>
							<td><input type="text" class="input-text" name="dsk"></td>
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
				<form method="POST" action="index.php?action=editBuku">
					<table class="table table-center">
						<tr>
							<td>Judul</td>
							<td>
								<input type="text" class="input-text" name="jdl" id="jdl">
								<input type="text" hidden="hidden" name="i" id="i">
							</td>
						</tr>
						<tr>
							<td>No Isbn</td>
							<td><input type="text" class="input-text" name="isb" id="isb"></td>
						</tr>
						<tr>
							<td>Penulis</td>
							<td><input type="text" class="input-text" name="pnls" id="pnls"></td>
						</tr>
						<tr>
							<td>Penerbit</td>
							<td><input type="text" class="input-text" name="pnrbt" id="pnrbt"></td>
						</tr>
						<tr>
							<td>Tahun</td>
							<td><input type="text" class="input-text" name="thn" id="thn"></td>
						</tr>
						<tr>
							<td>Harga Pokok</td>
							<td><input type="text" class="input-text" name="hrgpkp" id="hrgpkp"></td>
						</tr>
						<tr>
							<td>Harga Jual</td>
							<td><input type="text" class="input-text" name="hrgjl" id="hrgjl"></td>
						</tr>
						<tr>
							<td>Ppn</td>
							<td><input type="text" class="input-text" name="ppn" id="ppn"></td>
						</tr>
						<tr>
							<td>Diskon</td>
							<td><input type="text" class="input-text" name="dsk" id="dsk"></td>
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
			<h1 class="title">Data Buku</h1>
			<button class="btn btn-primary" onclick="addData()"><i class="fa fa-plus"></i> Add Buku</button>
			<br/><br/>
			<form method="POST" action="index.php?action=searchBuku">
				<input type="text" class="input-text" placeholder="judul.." name="a"><input type="SUBMIT" value="search" class="btn btn-primary" name="">
			</form>
		</div>
		<div class="form-input-body">
			<table id='tbl' class='table display datatable table-border'>
				<thead>
					<td>No</td>
					<td>Judul</td>
					<td>No Isbn</td>
					<td>Penulis</td>
					<td>Penerbit</td>
					<td>Tahun</td>
					<td>Stok</td>
					<td>Harga Pokok</td>
					<td>Harga Jual</td>
					<td>Ppn</td>
					<td>Diskon</td>
					<td width="60px;">Action</td>
				</thead>
				<tbody>
				<?php
				if (empty($_GET['a']) || empty($_GET['u']) ) {
				foreach ($f as $data) { ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $data['judul'] ?></td>
						<td><?php echo $data['noisbn'] ?></td>
						<td><?php echo $data['penulis'] ?></td>
						<td><?php echo $data['penerbit'] ?></td>
						<td><?php echo $data['tahun'] ?></td>
						<td><?php echo $data['stok'] ?></td>
						<td><?php echo $data['harga_pokok'] ?></td>
						<td><?php echo $data['harga_jual'] ?></td>
						<td><?php echo $data['ppn'] ?></td>
						<td><?php echo $data['diskon'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delBuku&amp;i=<?php echo $data['id_buku'] ?>"><i class="fa fa-trash"></i></a>
							<a class="btn btn-warning" onclick="editBuku('<?php echo $data['judul'] ?>','<?php echo $data['noisbn'] ?>','<?php echo $data['penulis'] ?>','<?php echo $data['penerbit'] ?>','<?php  echo $data['tahun'] ?>','<?php echo $data['stok'] ?>','<?php echo $data['harga_pokok'] ?>','<?php echo $data['harga_jual'] ?>','<?php echo $data['ppn'] ?>','<?php echo $data['diskon'] ?>','<?php echo $data['id_buku'] ?>')"><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
				<?php $no++; }

				}else{
					?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $f['judul'] ?></td>
						<td><?php echo $f['noisbn'] ?></td>
						<td><?php echo $f['penulis'] ?></td>
						<td><?php echo $f['penerbit'] ?></td>
						<td><?php echo $f['tahun'] ?></td>
						<td><?php echo $data['stok'] ?></td>
						<td><?php echo $f['harga_pokok'] ?></td>
						<td><?php echo $f['harga_jual'] ?></td>
						<td><?php echo $f['ppn'] ?></td>
						<td><?php echo $f['diskon'] ?></td>
						<td>
							<a class="btn btn-danger" href="index.php?action=delBuku&amp;i=<?php echo $f['id_buku'] ?>"><i class="fa fa-trash"></i></a>
							<a class="btn btn-warning" onclick="editBuku('<?php echo $f['judul'] ?>','<?php echo $f['noisbn'] ?>','<?php echo $f['penulis'] ?>','<?php echo $f['penerbit'] ?>','<?php  echo $f['tahun'] ?>','<?php echo $f['stok'] ?>','<?php echo $f['harga_pokok'] ?>','<?php echo $f['harga_jual'] ?>','<?php echo $f['ppn'] ?>','<?php echo $f['diskon'] ?>','<?php echo $f['id_buku'] ?>')"><i class="fa fa-pencil"></i></a>
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