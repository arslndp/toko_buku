<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	$id 	= $_POST['i'];
	$jdl	= $_POST['jdl'];
	$isb 	= $_POST['isb'];
	$pnls 	= $_POST['pnls'];
	$pnrbt  = $_POST['pnrbt'];
	$thn 	= $_POST['thn'];
	$stk 	= $_POST['stk'];
	$hrgpkp = $_POST['hrgpkp'];
	$hrgjl 	= $_POST['hrgjl'];
	$ppn  = $_POST['ppn'];
	$dskn 	= $_POST['dsk']; 



	$x = new buku($db);
	$c = $x -> edit($jdl,$isb,$pnls,$pnrbt,$thn,$stk,$hrgpkp,$hrgjl,$ppn,$dskn,$id);

echo "<script>window.location='index.php?page=admin/buku'</script>";