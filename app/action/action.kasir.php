<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php
session_start();
if ($_GET['p'] == 'add') {
	
	$isbn = $_POST['isbn'];
	$c 	  = $_POST['c'];

	//echo $isbn.'<br/>';
	//echo $c.'<br/>';

	$x = new kasir($db);
	$ex = $x -> add($isbn,$c);
	echo "<script>window.location='index.php'</script>";
}

if ($_GET['p'] == 'del') {
	$x = new kasir($db);
	$f = $x -> del($_GET['is']);
	echo "<script>window.location='index.php'</script>";
}

if ($_GET['p'] == 'edit') {
	
	$isbn = $_POST['isbn'];
	$c 	  = $_POST['c'];
	$id = $_POST['id'];
	$x = new kasir($db);
	$ex = $x -> edit($isbn,$c,$id);
	echo "<script>window.location='index.php'</script>";
}

if ($_GET['p'] == 'reset') {
	$x = new kasir($db);
	$f = $x -> reset();
	echo "<script>window.location='index.php'</script>";
}
if ($_GET['p'] == 'bond') {
	$x = new kasir($db);
	$total = $x -> total();
	$f = $x -> subTotal();
	$total = $x -> total();
	$report = $x -> report($total['total_penjualan']);
	session_start();
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>:: <?php echo $_SESSION['AKUN']['nama'] ?>@tokobuku :: | tokobuku</title>
		<style type="text/css">
			.bond
			{
				width: 30%;
				height: auto;
				margin: 0 auto;
				
			}
			.head
			{
				text-align: center;
			}
			
			.head p
			{
				font-size: 10px;
				margin: 0;
				top: 0;
			}
			.con
			{

			}
			table tr td
			{
				text-align: center;
			}
		</style>
	</head>
	<body>
	<div class="bond">
		<div class="head">
			<h1>TOKOBUKU</h1>
			<p>Taman Wisma Asri 1, Blok A4 No 11 Bekasi Utara</p>
			<hr/>
		</div>
		<div class="con">
			<table>
				<th>Judul</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<?php foreach ($f as $data) { ?>
				<tr>
					<td><?php echo $data['judul'] ?></td>
					<td><?php echo $data['jumlah'] ?></td>
					<td><?php echo number_format($data['total']) ?>.000</td>
				</tr>
				<?php }?>
			</table><br/>
			<b style="float: left;">PPN 10%</b><br/>
			<hr>
			<b style="float: left;">Total : </b><b style="float: right;">Rp.<?php echo number_format($total['total_penjualan']) ?>.000,-</b>
			<br/>
			<b style="float: left;">Uang Masuk : </b><b style="float: right;">Rp.<?php echo $_GET['u'] ?>,-</b>
			<br/>
			<hr>
			<b style="float: left;">Kembalian : </b><b style="float: right;">Rp.<?php echo number_format($_GET['u']-$total['total_penjualan']) ?>.000</b>
			<br/>
			<br/>
			<b style="float: right;">Kasir : <?php echo $_SESSION['AKUN']['nama'] ?></b>
		</div>
	</div>
	<script type="text/javascript">window.print()</script>
	</body>
	</html>
	<?php
}















/* ---------------------------------------------------------------------- */
//	n/a
/* ---------------------------------------------------------------------- */
/*	
	$xml = simplexml_load_file('system/tmp/tmp.xml');
	$status = isset($_GET['status'])?$_GET['status']:'';

	switch ($status) 
	{
		case 'add':
			$id = $_POST['i'];
			$sql = "SELECT * FROM tb_buku WHERE noisbn = ?";
			$x = $db -> prepare($sql);
			$x -> execute(array($id));
			$f = $x -> fetch();
			$isbn = $f['noisbn'];
			$judul = $f['judul'];
			$harga = $f['harga_jual'];
			$ppn = $f['ppn'];
			$diskon = $f['diskon'];


			$tabel = $xml -> addChild('cart');
			$tabel->addChild('isbn',$isbn);
			$tabel->addChild('judul',$judul);
			$tabel->addChild('harga',$harga);
			$tabel->addChild('ppn',$ppn);
			$tabel->addChild('diskon',$diskon);

			file_put_contents('system/tmp/tmp.xml', $xml->asXML());

			break;
		
		case 'del':
			$isbn = $_POST['i'];

			foreach ($xml->cart as $data) {
				if ($data->isbn == $isbn) {
					$row = dom_import_simplexml($data);
					$row -> parentNode -> removeChild($row);
				}
			}
			file_put_contents('system/tmp/tmp.xml', $xml->asXML());
			break;

		case 'total':
			foreach ($xml->cart as $data) {
				$harga = $data->harga;
				$h = $harga;
				echo $h;
				$h++;
			}
			break;

		default:
			$no = '1';
			foreach ($xml->cart as $cart) 
			{
				$isbn = $xml->isbn;
				$judul = $xml->judul;
				$harga = $xml->harga;
				$ppn = $xml->ppn;
				$diskon = $xml->diskon;
				?>
				<tr>
					<td><?php echo $cart->isbn ?></td>
					<td><?php echo $cart->judul ?></td>
					<td><?php echo $cart->ppn ?></td>
					<td><?php echo $cart->harga ?></td>
					<td><button class="btn-del" onclick="delBarang('<?php echo $cart->isbn ?>')">Del</button></td>
				</tr>
				<?php
			}
			break;
	}
	*/