<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard | system@tokobuku</title>
	<link rel="stylesheet" type="text/css" href="<?php echo __CSS__ ?>site.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo __CSS__ ?>font-awesome.min.css"/>
</head>
<body class="bg-home">
<div class="nav">
	<div class="nav-top">
		
	</div>
	<div class="nav-bottom">
		<div class="nav-b-left">
			<ul>
				<?php if ($_SESSION['AKUN']['akses'] == 'Root') { ?>
				<li>
					<a href="index.php?page=admin/users"><i class="fa fa-users"></i> Data users</a>
				</li>
				<li>
					<a href="index.php?page=admin/report"><i class="fa fa-print"></i> Report</a>
				</li>
				<?php }?>
				<li>
					<a href="index.php?page=admin/buku"><i class="fa fa-book"></i> Data Buku</a>
				</li>
				<li>
					<a href="index.php?page=gudang/pasok"><i class="fa fa-check"></i> Data Pasokan</a>
				</li>
				<li>
					<a href="index.php?page=gudang/distributor"><i class="fa fa-building"></i> Data Distributor</a>
				</li>
				<li>
					<a href="index.php"><i class="fa fa-home"></i> Home</a>
				</li>
			</ul>
		</div>
		<div class="nav-b-right">
			<ul>
				<li><a href="#"><i class="fa fa-user"></i> You are logged As <?php echo $_SESSION['AKUN']['username'] ?></a></li>
				<li><a href="index.php?action=Logout"><i class="fa fa-arrow-right"></i> Logout</a></li>
			</ul>
		</div>
	</div>
</div>