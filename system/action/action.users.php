<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

/**
* 
*/
class users
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function add($nama,$alamat,$telp,$status,$username,$password,$akses)
		{
			$sql = "INSERT INTO tb_kasir(nama,
										 alamat,
										 telepon,
										 status,
										 username,
										 password,
										 akses)
					VALUES(?,?,?,?,?,md5(?),?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($nama,$alamat,$telp,$status,$username,$password,$akses));
		}

		function edit($nama,$alamat,$telp,$username,$password,$akses,$i)
		{
			$sql = "UPDATE tb_kasir SET nama = ? ,
										alamat = ? ,
										telepon = ? ,
										username = ? ,
										password = ? ,
										akses = ?
					WHERE id_kasir = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($nama,$alamat,$telp,$username,$password,$akses,$i));
		}

		function fetch()
		{
			$sql = "SELECT * FROM tb_kasir";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function del($id)
		{
			$sql = "DELETE FROM tb_kasir
					WHERE id_kasir = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id));
		}

		function see($p)
		{
			$u = urldecode(($p));
			$sql = "SELECT * FROM tb_kasir WHERE username = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($u));
			$f = $x -> fetch();
			return $f;
		}
}