<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	$id = $_GET['i'];
	$x = new buku($db);
	$c = $x -> del($id);
	echo "<script>window.location='index.php?page=admin/buku'</script>";