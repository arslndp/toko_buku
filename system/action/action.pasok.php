<?php

/**
* 
*/
class pasok
{

	protected $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

		function add($idd,$idb,$jml)
		{
			/* ------------------------ */
			//	Aritmatika Pertambahan
			/* ------------------------ */
				$q = "SELECT * FROM tb_buku WHERE id_buku = ?";
				$eq = $this->db->prepare($q);
				$eq -> execute(array($idb));
				$ef = $eq -> fetch();
				$art = $ef['stok'] + $jml;

				$uq = "UPDATE tb_buku SET stok = ? WHERE id_buku = ?";
				$ue = $this->db -> prepare($uq);
				$ue -> execute(array($art,$idb));
			/* ------------------------ */

			$date = date('Y-m-d');
			$sql = "INSERT INTO tb_pasok(id_distributor,
										 id_buku,
										 jumlah,
										 tanggal)
					VALUES(?,?,?,?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($idd,$idb,$jml,$date));
		}

		function del($i,$jml)
		{
			/* ------------------------ */
			//	Aritmatika Pengurangan
			/* ------------------------ */
				$q = "SELECT tb_buku.* , tb_pasok.* 
					  FROM tb_buku 
					  INNER JOIN tb_pasok ON tb_buku.id_buku = tb_pasok.id_buku
					  WHERE id_pasok = ?";
				$eq = $this->db->prepare($q);
				$eq -> execute(array($i));
				$ef = $eq -> fetch();
				$art = $ef['stok'] - $jml;

				$uq = "UPDATE tb_buku SET stok = ? WHERE id_buku = ?";
				$ue = $this->db -> prepare($uq);
				$ue -> execute(array($art,$ef['id_buku']));
			/* ------------------------ */

			$sql = "DELETE FROM tb_pasok WHERE id_pasok = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($i));
		}

		function edit($d,$b,$j,$i)
		{
			/* ------------------------ */
			//	Aritmatika Pengurangan
			/* ------------------------ */
			//	cek data
			/* ------------------------ */
			//$cs = "SELECT * FROM tb_buku WHERE ";
			/* ------------------------ */
			/*$ss = "SELECT * 
				   FROM tb_pasok
				   WHERE id_pasok = ?";
			$xs = $this->db->prepare($ss);
			$xs -> execute(array($i));
			$fs = $xs -> fetch();

			if ($fs['jumlah'] > $j) 
			{
				$jm = $j;
			}
			if ($fs['jumlah'] < $j) 
			{
				$jm = $j;
			}
			if ($fs['jumlah'] == $j) 
			{
				$jm = $fs['jumlah'];
			}*/

			/* ------------------------ */
			//	Logika timpa data buku
			/* ------------------------ */

			//$uq = "UPDATE tb_buku SET stok = ? WHERE id_buku = ?";
			//	$ue = $this->db -> prepare($uq);
			//	$ue -> execute(array($art,$ef['id_buku'])); //logikanya belum masuk untuk ngerubah stok saat ada yg di ubah
			/* ------------------------ */

			$sql = "UPDATE tb_pasok 
					SET id_distributor = ? ,
						id_buku = ? ,
						jumlah = ?
					WHERE id_pasok = ? ";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($d,$b,$j,$i));
		}

		function fetch()
		{
			$sql = "SELECT tb_pasok.* ,tb_distributor.* , tb_buku.*
					FROM tb_pasok
					INNER JOIN tb_distributor ON tb_pasok.id_distributor = tb_distributor.id_distributor
					INNER JOIN tb_buku ON tb_pasok.id_buku = tb_buku.id_buku";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function fetchDis()
		{
			$sql = "SELECT * FROM tb_distributor";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function fetchBuk()
		{
			$sql = "SELECT * FROM tb_buku";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function see($p)
		{
			$u = urldecode(($p));
			$sql = "SELECT tb_pasok.* ,tb_distributor.* , tb_buku.*
					FROM tb_pasok
					INNER JOIN tb_distributor ON tb_pasok.id_distributor = tb_distributor.id_distributor
					INNER JOIN tb_buku ON tb_pasok.id_buku = tb_buku.id_buku
					WHERE tb_buku.judul = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($u));
			$f = $x -> fetch();
			return $f;
		}
}