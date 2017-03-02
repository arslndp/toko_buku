<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	
	$jdl 	= $_POST['jdl'];
	$isb 	= $_POST['isb'];
	$pnls 	= $_POST['pnls'];
	$pnrbt	= $_POST['pnrbt'];
	$thn	= $_POST['thn'];
//	$stk	= $_POST['stk'];
	$hrgpkp = $_POST['hrgpkp'];
	$hrgjl 	= $_POST['hrgjl'];
	$ppn 	= $_POST['ppn'];
	$dsk 	= $_POST['dsk'];

	$x = new buku($db);
	$ex = $x -> add($jdl,$isb,$pnls,$pnrbt,$thn,/*$stk,*/$hrgpkp,$hrgjl,$ppn,$dsk);
	echo "<script>window.location='index.php?page=admin/buku'</script>";