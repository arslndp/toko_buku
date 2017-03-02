<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	
	$nmd 	= $_POST['nmd'];
	$almt	= $_POST['almt'];
	$tlp 	= $_POST['tlp'];
	$id 	= $_POST['i'];

	$x = new distributor($db); 
	$f = $x -> edit($nmd,$almt,$tlp,$id);
	echo "<script>window.location='index.php?page=gudang/distributor'</script>";