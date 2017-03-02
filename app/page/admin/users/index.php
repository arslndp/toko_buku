<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php 
	session_start();
	if ($_SESSION['AKUN']['akses'] == 'Root') {

	$x = new users($db);
	
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
				<h1 class="title">Tambah Data Users</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=addUsers">
					<table class="table table-center">
						<tr>
							<td>Nama</td>
							<td><input type="text" class="input-text" name="nm"></td>
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
							<td>Username</td>
							<td><input type="text" class="input-text" name="usn"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" class="input-text" name="psw"></td>
						</tr>
						<tr>
							<td>Akses</td>
							<td>
								<select class="input-text" name="aks" id="aks">
									<option value="Root">Admin</option>
									<option value="Gudang">Gudang</option>
									<option value="Kasir">Kasir</option>
								</select>
							</td>
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
				<h1 class="title">Ubah Data Users</h1>
			</div>
			<div class="form-input-body">
				<form method="POST" action="index.php?action=editUsers">
					<table class="table table-center">
						<tr>
							<td>Nama</td>
							<td>
								<input type="text" class="input-text" name="nm" id="nm">
								<input type="text" hidden="hidden" name="i" id="i">
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
							<td>Username</td>
							<td><input type="text" class="input-text" name="usn" id="usn"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="text" class="input-text" name="psw" id="psw"></td>
						</tr>
						<tr>
							<td>Akses</td>
							<td>
								<select class="input-text" name="aks" id="aks">
									<option value="Root">Admin</option>
									<option value="Gudang">Gudang</option>
									<option value="Kasir">Kasir</option>
								</select>
							</td>
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
			<h1 class="title">Data Users</h1>
			<button class="btn btn-primary" onclick="addData()"><i class="fa fa-plus"></i> Add Users</button>
			<br/><br/>
			<form method="POST" action="index.php?action=searchUsers">
				<input type="text" class="input-text" placeholder="username.." name="a"><input type="SUBMIT" value="search" class="btn btn-primary" name="">
			</form>
		</div>
		<div class="form-input-body">
			<table id='tbl' class='table display datatable table-border'>
				<thead>
					<td>No</td>
					<td>Nama</td>
					<td>Alamat</td>
					<td>Username</td>
					<td>Password</td>
					<td>Telp</td>
					<td>Status</td>
					<td>Akses</td>
					<td width="60px;">Action</td>
				</thead>
				<tbody>
				<?php
					if (empty($_GET['a']) || empty($_GET['u']) ) {
					 foreach ($f as $data) { ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $data['nama'] ?></td>
							<td><?php echo $data['alamat'] ?></td>
							<td><?php echo $data['username'] ?></td>
							<td><?php echo $data['password'] ?></td>
							<td><?php echo $data['telepon'] ?></td>
							<td><?php echo $data['status'] ?></td>
							<td><?php echo $data['akses'] ?></td>
							<td>
								<a class="btn btn-danger" href="index.php?action=delUsers&amp;i=<?php echo base64_encode($data['id_kasir']) ?>"><i class="fa fa-trash"></i></a>
								<a class="btn btn-warning" onclick='editUsers("<?php echo $data['nama'] ?>","<?php echo $data['alamat'] ?>","<?php echo $data['telepon'] ?>","<?php echo $data['username'] ?>","<?php  echo $data['password'] ?>","<?php echo $data['akses'] ?>","<?php echo $data['id_kasir	'] ?>")'><i class="fa fa-pencil"></i></a>
							</td>
						</tr>
					<?php $no++; }
					}else{ ?>
					<tr>
						<td><?php echo $no ?></td>
						<td><?php echo $f['nama'] ?></td>
						<td><?php echo $f['alamat'] ?></td>
						<td><?php echo $f['username'] ?></td>
						<td><?php echo $f['password'] ?></td>
						<td><?php echo $f['telepon'] ?></td>
						<td><?php echo $f['status'] ?></td>
						<td><?php echo $f['akses'] ?></td>
						<td>
								<a class="btn btn-danger" href="index.php?action=delUsers&amp;i=<?php echo base64_encode($f['id_kasir']) ?>"><i class="fa fa-trash"></i></a>
								<a class="btn btn-warning" onclick='editUsers("<?php echo $f['nama'] ?>","<?php echo $f['alamat'] ?>","<?php echo $f['telepon'] ?>","<?php echo $f['username'] ?>","<?php  echo $f['password'] ?>","<?php echo $f['akses'] ?>","<?php echo $f['id_kasir	'] ?>")'><i class="fa fa-pencil"></i></a>
						</td>
					</tr>
					<?php
					$no++;
					}
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
<?php }else{
	echo "<script>window.location='index.php'</script>";
	}?>