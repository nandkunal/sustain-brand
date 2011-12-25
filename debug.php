<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
//echo ADAO::isProductsExists(1);

$kk="1,2";
$m=explode(",",$kk);
echo count($m);


?>

