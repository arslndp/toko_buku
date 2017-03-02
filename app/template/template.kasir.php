<?php session_start() ?>
<?php
	$no = '1';
	$x = new kasir($db);
	$total = $x -> total();
	$f = $x -> subTotal();
?>
<!DOCTYPE html>
<html>
<head>
	<title>:: <?php echo $_SESSION['AKUN']['nama'] ?>@tokobuku :: | tokobuku</title>
	<style type="text/css">
		body
		{
			font-family: sans-serif;
		}
		.panel
		{
			border: 1px solid  #003171;
			height: auto;
			color: #fff;
			font-weight: bold;
		}
		.panel-heading
		{
			height: auto;
			padding: 20px;
			background:  #003171;
		}
		.panel-body
		{
			color: #333;
			height: auto;
			padding: 30px;
		}
		.col-md-12
		{
			width: 100%;
			height: auto;
		}
		.col-md-6
		{
			float: left;
			width: 50%;
		}
		.btn{
			padding: 10px;
			border: 1px solid #dbdbdb;
			margin-bottom: 10px;
			color: #fff;
			font-weight: bolder;
		}
		.btn-add
		{
			background:  #003171;
		}
		.btn-danger
		{
			background:  #CF000F;
		}
		.popup
		{
			width: 40%;
			height: auto;
			position: fixed;
			background: #fff;
			margin: 30px 295px;
		}
		.bg
		{
			padding: 0;
			margin: 0;
			top: 0;
			left: 0;
			position: fixed;
			background: rgba(0,0,0,0.6);
			height: 8000px;
			width: 100%;
		}
		.tabl{
			text-align: center;
			border: 1px solid #dbdbdb;
		}
		.tabl tbody tr td{
			border: 1px solid #dbdbdb;
		}
		.tabl thead td{
			border: 1px solid #dbdbdb;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="<?php echo __CSS__ ?>font-awesome.min.css"/>
</head>
<body>
<div class="bg">
	<div class="col-md-6 popup add">
		<div class="panel">
			<div class="panel-heading">
				Add Items	
			</div>
			<div class="panel-body">
				<form method="POST" action="index.php?action=kasir&p=add">
					<table>
						<tr>
							<td>NoIsbn</td>
							<td> : <input type="text" name="isbn"></td>
						</tr>
						<tr>
							<td>Count</td>
							<td> : <input type="text" name="c"></td>
						</tr>
						<tr>
							<td><a class="btn btn-danger" onclick="closeP()">Cancel</a></td>
							<td> <input type="submit" class="btn btn-add" name="" value="Add"></td>
						</tr>
					</table>	
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6 popup edit">
		<div class="panel">
			<div class="panel-heading">
				edit Items	
			</div>
			<div class="panel-body">
				<form method="POST" action="index.php?action=kasir&p=edit">
					<table>
					<input type="text" hidden="hidden" name="id" id="id">
						<tr>
							<td>NoIsbn</td>
							<td> : <input type="text" name="isbn" id="isbn"></td>
						</tr>
						<tr>
							<td>Count</td>
							<td> : <input type="text" name="c" id="c"></td>
						</tr>
						<tr>
							<td><a class="btn btn-danger" onclick="closeP()">Cancel</a></td>
							<td> <input type="submit" class="btn btn-add" name="" value="Add"></td>
						</tr>
					</table>	
				</form>
			</div>
		</div>
	</div>
</div>
<div class="panel">
	<div class="panel-heading">
		Kasir <b style="float: right;">logged as <?php echo  $_SESSION['AKUN']['nama'] ?>@tokobuku | <a href="index.php?action=Logout" style="color: #fff">Keluar</a></b>
	</div>
	<div class="panel-body">
	<button class="btn btn-add" onclick="addBarang()"><i class="fa fa-plus"></i> Add</button>
	<a href="index.php?action=kasir&amp;p=reset"><button class="btn btn-add"><i class="fa fa-pause"></i> Reset</button></a>
	<a href="index.php?action=kasir&amp;p=bond&amp;&amp;u=<?php echo  $_GET['uang'] ?>"><button class="btn btn-add"><i class="fa fa-print"></i> Bond</button></a>
		<div class="col-md-12">
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						List Barang	
					</div>
					<div class="panel-body">
						<table class="tabl">
							<thead>
								<td>No</td>
								<td>NoISBN</td>
								<td>Judul</td>
								<td>Count</td>
								<td>Total</td>
								<td>Ppn</td>
								<td>diskon</td>
								<td>Aksi</td>
							</thead>
							<tbody>
								<?php foreach ($f as $data) {	?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $data['noisbn'] ?></td>
										<td><?php echo $data['judul'] ?></td>
										<td><?php echo $data['jumlah'] ?></td>
										<td><?php echo $data['harga_jual'] ?></td>
										<td><?php echo $data['ppn'] ?>%</td>
										<td><?php echo $data['diskon'] ?>%</td>
										<td>
											<a href="index.php?action=kasir&amp;p=del&amp;is=<?php echo $data['id_penjualan'] ?>"><button class="btn btn-danger">Del</button></a>
											<button class="btn btn-add" onclick="editItems('<?php echo $data['noisbn'] ?>','<?php echo $data['jumlah'] ?>','<?php echo $data['id_penjualan'] ?>')">Edit</button>
										</td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						Subtotal <b style="float: right;"><?php echo date('Y_M_D') ?></b>
					</div>
					<div class="panel-body">
						<h1>Subtotal : Rp.<?php echo number_format($total['total_penjualan']) ?>.000,-</h1>
						<h1><?php 
											if(!empty($_GET['uang'])){
												$h = number_format($_GET['uang']-$total['total_penjualan']);
												echo "<h1>Kembalian : Rp.".$h.".000,-</h1>";
											}else{ }?></h1>
						<div class="panel">
							<div class="panel-heading">
								Bayar
							</div>
							<div class="panel-body">
								<form method="GET" action="index.php">
									<table>
										<tr>
											<td>Uang</td>
											<td> : <input type="text" name="uang"></td>
										</tr>
										<tr>
											<td>Cost</td>
											<td> : <input type="text" readonly="readonly" name="" value="<?php echo number_format($total['total_penjualan']) ?>.000"></td>
										</tr>
										<tr>
											<td>Kembalian</td>
											<td> : <input type="text" readonly="readonly" value="<?php 
											if(!empty($_GET['uang'])){
												echo number_format($_GET['uang']-$total['total_penjualan']);
											}else{}

											 ?>.000" name=""></td>
										</tr>
										<tr>
											<td><input type="submit" class="btn btn-add" value="Bayar" name=""></td>
										</tr>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
</div>
<script type="text/javascript" src='<?php echo __JS__ ?>jquery.min.js'></script>
<script type="text/javascript" src='<?php echo __JS__ ?>kasir.js'></script>
</body>
</html>