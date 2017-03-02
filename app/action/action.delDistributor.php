<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	$i = $_GET['i'];
	$x = new distributor($db);
	$f = $x -> del($i);
	echo "<script>window.location='index.php?page=gudang/distributor'</script>";