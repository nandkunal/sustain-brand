<?php
//session_start();
require_once('ADAO.php');
class UserFunctions extends ADAO
{
	
	public static function isUserAuthenticated(){
		if(isset($_SESSION['id'])){
			return true;
		}
		else
		return false;
		
		
	}
	
	public static function addtoCartNotLogged($product,$category){
	$item_details=ADAO::getItemDetailsById($product['id']);
	
	  $cart = @$_SESSION['cart'];
	  if ($cart) {
	  $cart .= ','.$product['id'].$product['cat'];
	  } else {
	  $cart =$product['id'].$product['cat'];
	  }
	  $_SESSION['cart'] = $cart;
	  $message="Addded to Cart";
	 return $message;
		
	
	}
	
	
	public static function addtoCartLogged($product,$category){
		$item_details=ADAO::getItemDetailsById($product['id']);
		  $cart =$product['id'].$product['cat'];
		 $user_id=$_SESSION['id'];
		ADAO::inserCartItemsLoggedIn($user_id,$cart);
		 $message="Addded to Cart";
	     return $message;
	}
	
		
		
	
	
	
	
	
	
}
?>