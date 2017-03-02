<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	$nama = urlencode($_POST['a']);

	echo "<script>window.location='index.php?page=admin/users&a=see&u=".$nama."'</script>";
	