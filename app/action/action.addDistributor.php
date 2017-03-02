<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	
	$nmd 	= $_POST['nmd'];
	$almt	= $_POST['almt'];
	$tlp 	= $_POST['tlp'];

	$x = new distributor($db); 
	$f = $x -> add($nmd,$almt,$tlp);
	echo "<script>window.location='index.php?page=gudang/distributor'</script>";