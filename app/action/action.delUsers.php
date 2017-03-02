<?php defined('SYSTEM') OR exit('Direct Link dilarang'); ?>
<?php

$x = new users($db);
$f = $x -> del(base64_decode($_GET['i']));
echo "<script>window.location='index.php?page=admin/users'</script>";