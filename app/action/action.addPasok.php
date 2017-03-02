<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

$d = $_POST['d'];
$b = $_POST['b'];
$j = $_POST['jml'];

$x = new pasok($db);
$c = $x -> add($d,$b,$j);
echo "<script>window.location='index.php?page=gudang/pasok'</script>";