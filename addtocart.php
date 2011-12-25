<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$item_id=$_POST['item_id'];
$case=$_POST['case'];
$product=array();
$product['id']=$item_id;
$product['cat']=$case;

$auth=UserFunctions::isUserAuthenticated();
if(!$auth){
	$message=UserFunctions::addtoCartNotLogged($product,$case);
}
else
{
	$message=UserFunctions::addtoCartLogged($product,$case);
}
echo $message;




?>