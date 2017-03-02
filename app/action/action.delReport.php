<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

$x = new kasir($db);
$f = $x -> delReport(base64_decode($_GET['i']));
echo "<script>window.location='index.php?page=admin/report'</script>";