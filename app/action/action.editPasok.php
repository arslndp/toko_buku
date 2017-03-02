<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

	$i = $_POST['i'];
	$d = $_POST['d'];
	$b = $_POST['b'];
	$j = $_POST['jml'];


	echo $i.'<br/>';
	echo $d.'<br/>';
	echo $b.'<br/>';
	echo $j.'<br/>';

	$x = new pasok($db);
	$ex = $x -> edit($d,$b,$j,$i);

	echo "<script>window.location='index.php?page=gudang/pasok'</script>";