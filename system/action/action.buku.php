<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

/**
* 
*/
class buku
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function add($jdl,$isb,$pnls,$pnrbt,$thn,/*$stk,*/$hrgpkp,$hrgjl,$ppn,$dsk)
		{
			$q = "INSERT INTO tb_buku(judul,
									  noisbn,
									  penulis,
									  penerbit,
									  tahun,
									  /*stok,*/
									  harga_pokok,
									  harga_jual,
									  ppn,
									  diskon)
				  VALUES(?,?,?,?,?,?,?,?,?)";
			$x = $this->db -> prepare($q);
			$x -> execute(array($jdl,$isb,$pnls,$pnrbt,$thn,/*$stk,*/$hrgpkp,$hrgjl,$ppn,$dsk));
			if ($x) {
				return 'sukses';
			}
			else
			{
				return 'fail';
			}
		}

		function fetch()
		{
			$sql = "SELECT * 
					FROM tb_buku";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function see($p)
		{
			$u = urldecode(($p));
			$sql = "SELECT * FROM tb_buku WHERE judul = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($u));
			$f = $x -> fetch();
			return $f;
		}

		function del($id)
		{
			$sql = "DELETE FROM tb_buku 
					WHERE tb_buku.id_buku = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id));
		}

		function edit($jdl,$isb,$pnls,$pnrbt,$thn,$stk,$hrgpkp,$hrgjl,$ppn,$dskn,$id)
		{
			$sql = "UPDATE tb_buku SET judul = ? , 
									   noisbn = ? , 
									   penulis = ? , 
									   penerbit = ? , 
									   tahun = ? ,
									   harga_pokok = ? ,
									   harga_jual = ? ,
									   ppn = ? ,
									   diskon = ?
					WHERE id_buku = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($jdl,$isb,$pnls,$pnrbt,$thn,$hrgpkp,$hrgjl,$ppn,$dskn,$id));
			if ($x) 
			{
				return 'ok';
			}
			else
			{
				return 'fail';
			}
		}
}