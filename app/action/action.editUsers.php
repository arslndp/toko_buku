<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	
	$nama 		= $_POST['nm'];
	$alamat		= $_POST['almt'];
	$telp		= $_POST['tlp'];
	$username 	= $_POST['usn'];
	$password	= $_POST['psw'];
	$akses		= $_POST['aks'];
	$id			= $_POST['i'];

	$x = new users($db);
	$f = $x -> edit($nama,$alamat,$telp,$username,$password,$akses,$id);
	echo "<script>window.location='index.php?page=admin/users'</script>";