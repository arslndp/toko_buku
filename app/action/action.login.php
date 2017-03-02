<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
	session_start();
	
	$u = $_POST['u'];
	$p = $_POST['p'];

	$x = new akun($db);
	$l = $x -> login($u,$p);

	if ($l == 'fail') 
	{
		echo "<script>window.location='login.php?status=fail'</script>";
	}
	else
	{
		echo "<script>window.location='index.php'</script>";
	}