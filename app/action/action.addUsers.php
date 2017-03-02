<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	
	$nama 		= $_POST['nm'];
	$alamat		= $_POST['almt'];
	$telp		= $_POST['tlp'];
	$status 	= 'LIVE';
	$username 	= $_POST['usn'];
	$password	= $_POST['psw'];
	$akses		= $_POST['aks'];

	$x = new users($db);
	$f = $x -> add($nama,$alamat,$telp,$status,$username,$password,$akses);
		echo "<script>window.location='index.php?page=admin/users'</script>";