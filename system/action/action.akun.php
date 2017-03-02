<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
/**
* 
*/
class akun
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function login($u,$p)
		{
			$q = "SELECT *
				  FROM tb_kasir
				  WHERE username = ? 
				  AND password = md5(?)";
			$x = $this->db -> prepare($q);
			$x -> execute(array($u,$p));
			$c = $x -> rowCount();

			if ($c > 0) 
			{	
				session_start();
				$fetch = $x -> fetch();
				$_SESSION['AKUN'] = $fetch;
				echo "<script>window.location='index.php'</script>";
			}
			else
			{
				return 'fail';
			}
		}
}