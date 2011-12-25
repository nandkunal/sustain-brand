<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
if(!isset($_SESSION['cart'])){
	echo "No Items Added to your Cart";
}
else
{
echo $_SESSION['cart'];
}
