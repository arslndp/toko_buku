<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php


/**
* 
*/
class penjualan
{
	
	protected $db;

	function __construct($db)
	{
		$this->db = $db;
	}

		function bayar($id,$k)
		{
			$sql = "INSERT INTO tb_penjualan(id_buku,
											 id_kasir,
											 jumlah,
											 total,
											 tanggal)
					VALUES(?,?,?,?,?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id,$k));

		}
}