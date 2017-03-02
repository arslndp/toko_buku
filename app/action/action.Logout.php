<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	session_start();
	session_destroy();
	echo "<script>window.location='index.php'</script>";