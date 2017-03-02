<?php
define('SYSTEM', '/system');

/* ------------------------------------------ */

	require 'system/lib/ini.lib.php';

	require 'system/db/ini.db.php';

	require 'system/action/ini.all.php';

/* ------------------------------------------ */
?>
<?php
session_start();
if ($_SESSION['AKUN']) {
	echo "<script>window.location='index.php'</script>";
}else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>:: Login Kasir :: system@tokobuku </title>
	<link rel="stylesheet" type="text/css" href="<?php echo __CSS__ ?>site.css"/>
</head>
<body class="bg-login">
<div class="col-md-4 form">
	<form method="POST" action="index.php?action=login">
		<table>
			<tr>
				<td>Username </td>
				<td> : <input type="text" class="input-text" name="u"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td> : <input type="text" class="input-text" name="p"></td>
			</tr>
			<?php if ($_GET['status'] == 'fail') { ?>
			<tr>
				<td></td>
				<td><a class="pin pin-danger">Gagal Login cek kembali username dan password</a></td>
			</tr>
			<?php }else{}?>
			<tr>
				<td></td>
				<td>.<input type="submit" class="btn btn-a" value="Login" name=""></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
<?php 
	}?>