<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	$x = new pasok($db);
	$c = $x -> del($_GET['i'],$_GET['j']);
	echo "<script>window.location='index.php?page=gudang/pasok'</script>";