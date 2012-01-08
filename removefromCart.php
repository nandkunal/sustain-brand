<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
	
$item_id_cat=$_POST['item_id_cat'];


if(!$auth){
	
	$cart=$_SESSION['cart'];
	$cart_array=explode(",",$cart);
	$newcart='';
	foreach($cart_array as $cart_items){
		
		if($cart_items!=$item_id_cat){
			if ($newcart != '') {
				
			$newcart .= ','.$cart_items;
} else {
$newcart = $cart_items;
		}
		
		}
	}
	$cart = $newcart;	
	$_SESSION['cart'] = $cart;	
	
	
}
else
{
	
	 $res=ADAO::deleteItemsfromBasket($_SESSION['id'],$item_id_cat);
	
	
	
}

		
		
