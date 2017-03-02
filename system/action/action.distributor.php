<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

/**
* 
*/
class distributor
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function add($nmd,$almt,$tlp)
		{
			$sql = "INSERT INTO tb_distributor(nama_distributor,alamat,telepon)
					VALUES(?,?,?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($nmd,$almt,$tlp));
		}

		function fetch()
		{
			$sql = "SELECT * FROM tb_distributor";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function see($p)
		{
			$u = urldecode(($p));
			$sql = "SELECT * FROM tb_distributor WHERE nama_distributor = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($u));
			$f = $x -> fetch();
			return $f;
		}

		function edit($nmd,$almt,$tlp,$id)
		{
			$sql = "UPDATE tb_distributor 
					SET    nama_distributor = ? ,
						   alamat = ? ,
						   telepon = ?
					WHERE id_distributor = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($nmd,$almt,$tlp,$id));
		}

		function del($i)
		{
			$sql = "DELETE FROM tb_distributor WHERE id_distributor = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($i));
		}
}