<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	$nama = urlencode($_POST['a']);

	echo "<script>window.location='index.php?page=gudang/pasok&a=see&u=".$nama."'</script>";
	