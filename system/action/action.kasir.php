<?php

/**
* 
*/
class kasir
{

	protected $db;
	
	function __construct($db)
	{
		$this->db = $db;
	}

		function total()
		{
			$sql = "SELECT SUM(total) AS total_penjualan
					FROM tb_penjualan";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetch();
			return $f;
		}

		function delReport($id)
		{
			$sql = "DELETE FROM tb_laporan 
					WHERE tb_laporan.id_laporan = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($id));
		}

		function see($p)
		{
			$u = urldecode(($p));
			$sql = "SELECT tb_laporan.* , tb_kasir.*
					FROM tb_laporan
					INNER JOIN tb_kasir ON tb_kasir.id_kasir = tb_laporan.id_kasir
					WHERE tb_kasir.nama = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($u));
			$f = $x -> fetch();
			return $f;
		}

		function fetchReport()
		{
			$sql = "SELECT tb_laporan.* , tb_kasir.*
					FROM tb_laporan
					INNER JOIN tb_kasir ON tb_kasir.id_kasir = tb_laporan.id_kasir";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function report($t)
		{
			session_start();
			$sql = "INSERT INTO tb_laporan(id_kasir,total,tanggal)
					VALUES(?,?,?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($_SESSION['AKUN']['id_kasir'],$t,date('Y-m-d')));
		}

		function subTotal()
		{
			$sql = "SELECT tb_buku.* , tb_penjualan.* , tb_kasir.*
					FROM tb_penjualan
					INNER JOIN tb_buku ON tb_penjualan.id_buku = tb_buku.id_buku
					INNER JOIN tb_kasir ON tb_penjualan.id_kasir = tb_kasir.id_kasir";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			$f = $x -> fetchAll();
			return $f;
		}

		function add($isbn,$c)
		{	
			session_start();
			/* ------------------------------ */
			//	ARITMATICS
			/* ------------------------------ */
			$q = "SELECT * FROM tb_buku WHERE noisbn = ?";
			$ex = $this->db -> prepare($q);
			$ex -> execute(array($isbn));
			$f = $ex -> fetch();
			/* ------------------------------ */
			//$t = $f['harga_jual']*$c;
			/* ------------------------------ */
			//	DECLARE
			/* ------------------------------ */
			$jumlah = $c;
			$harga_jual = $f['harga_jual'];
			$diskon = $f['diskon'];
			$ppn = $f['ppn'];
			/* ------------------------------ */
			/* ------------------------------ */
			//	PAJAK AND DISKON
			/* ------------------------------ */
			/*
			$hasil  = $harga_jual * $diskon/100;
			$hasil2 = $harga_jual - $hasil;
			$hasil3 = $hasil2 * $ppn/100;
			$hasil4 = $hasil3 * $jumlah;
			$hasil5 = $harga_jual * $jumlah;
			$t  = $hasil5 - $hasil4;
			*/
			$h1 = $harga_jual*$ppn/100;  // ppn
			$h2 = $harga_jual*$jumlah;  // jumlah
			$h3 = $harga_jual*$diskon/100; // diskon
			$pajak = $h1*$jumlah;
			$diskon = $h2-$h3;
			$t = $diskon+$pajak;
			//echo $h3."<br/>";
			//echo $h1.'<br/>';
			//echo $harga_jual."<br/>";
			//echo $diskon."<br/>";
			//echo $ppn."<br/>";
			echo $t;
			/* ------------------------------ */
			/* ------------------------------ */			
			$date = date("Y-m-d");
			$sql = "INSERT INTO tb_penjualan(id_buku,id_kasir,jumlah,total,tanggal)
					VALUES(?,?,?,?,?)";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($f['id_buku'],
								$_SESSION['AKUN']['id_kasir'],
								$c,
								$t,
								$date
				));
			/* ------------------------------ */
			// ARITMATICS
			/* ------------------------------ */
			$sqlc = "SELECT * FROM tb_buku WHERE id_buku = ?";
			$xc = $this->db -> prepare($sqlc);
			$xc -> execute(array($f['id_buku']));
			$fc = $xc -> fetch();
			/* ------------------------------ */
			$art = $fc['stok']-$c;
			/* ------------------------------ */
			// UPDATE
			/* ------------------------------ */
			$sql1 = "UPDATE tb_buku SET stok = ? WHERE id_buku = ?";			
			$x1 = $this->db -> prepare($sql1);
			$x1 -> execute(array($art,$fc['id_buku']));
			/* ------------------------------ */
		}

		function edit($isbn,$c,$id)
		{	
			session_start();
			/* ------------------------------ */
			//	ARITMATICS
			/* ------------------------------ */
			$q = "SELECT * FROM tb_buku WHERE noisbn = ?";
			$ex = $this->db -> prepare($q);
			$ex -> execute(array($isbn));
			$f = $ex -> fetch();
			/* ------------------------------ */
			$t = $f['harga_jual']*$c;
			/* ------------------------------ */			
			$qj = "SELECT * FROM tb_penjualan WHERE id_penjualan = ?";
			$xj = $this->db -> prepare($qj);
			$xj -> execute(array($id));
			$fj = $xj -> fetch();
			$art = $c+$fj['jumlah'];
			echo $fj['jumlah'].'<br/>';
			echo $c.'<br/>';
			echo $art;
			/* ------------------------------ */
			//	UPDATE
			/* ------------------------------ */
			
			$qe = "UPDATE tb_buku SET stok = ? WHERE id_buku = ?";
			$qe = $this->db -> prepare($qe);
			$qe -> execute(array($art,$fj['id_buku']));
			
			/* ------------------------------ */			
			$date = date("Y-m-d");
			$sql = "UPDATE tb_penjualan SET id_buku = ? ,
											id_kasir = ? ,
											jumlah = ? ,
											total = ?,
											tanggal = ?
					WHERE id_penjualan = ?";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($f['id_buku'],
								$_SESSION['AKUN']['id_kasir'],
								$c,
								$t,
								$date,
								$id
				));
			/* ------------------------------ */			
		}

		function reset()
		{
			/* ------------------------------ */			
			//	ARITMATICS
			/* ------------------------------ */			
			/* ------------------------------ */				

			$sql = "TRUNCATE tb_penjualan";
			$x = $this->db -> prepare($sql);
			$x -> execute();
			
		}

		function del($p)
		{
			/* ------------------------------ */
			//	ARITMATICs
			/* ------------------------------ */
			$q = "SELECT tb_penjualan.* , tb_buku.*
				  FROM tb_penjualan 
				  INNER JOIN tb_buku ON tb_penjualan.id_buku = tb_buku.id_buku
				  WHERE id_penjualan = ?";
			$xq = $this->db -> prepare($q);
			$xq -> execute(array($p));
			$fq = $xq -> fetch();
			$art = $fq['stok']+$fq['jumlah'];
			/* ------------------------------ */
			//	UPDATE
			/* ------------------------------ */
			$qe = "UPDATE tb_buku SET stok = ? WHERE id_buku = ?";
			$qe = $this->db -> prepare($qe);
			$qe -> execute(array($art,$fq['id_buku']));
			/* ------------------------------ */
			$sql = "DELETE FROM tb_penjualan
					WHERE id_penjualan = ? ";
			$x = $this->db -> prepare($sql);
			$x -> execute(array($p));
		}

}