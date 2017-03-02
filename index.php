<?php
define('SYSTEM', '/system');
session_start();
/* ------------------------------------------ */

	require 'system/lib/ini.lib.php';

	require 'system/db/ini.db.php';

	require 'system/action/ini.all.php';

/* ------------------------------------------ */

if(!empty($_GET['action']))
{
	include 'app/action/action.'.$_GET['action'].'.php';
}
else
{
	if (!empty($_SESSION['AKUN'])) 
	{
		if ($_SESSION['AKUN']['akses'] == 'Root') {
			include 'app/template/template.head.php';	
			if (!empty($_GET['page'])) 
			{
				include 'app/page/'.$_GET['page'].'/index.php';		
			}
			else
			{
				include 'app/template/template.home.php';	
			}	
			include 'app/template/template.foot.php';	
		}
			if ($_SESSION['AKUN']['akses'] == 'Gudang') 
			{
				include 'app/template/template.head.php';	
				if (!empty($_GET['page'])) 
				{
					include 'app/page/'.$_GET['page'].'/index.php';		
				}
				else
				{
					include 'app/template/template.home.php';	
				}	
				include 'app/template/template.foot.php';		
			}
		if ($_SESSION['AKUN']['akses'] == 'Kasir') 
		{
			include 'app/template/template.kasir.php';	
		}
	}
	else
	{
		echo "<script>window.location='login.php'</script>";
	}
}