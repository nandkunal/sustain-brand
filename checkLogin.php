<?php
ob_start();
session_start();
require_once("administrator/includes/UserLoginManager.php");
require_once("administrator/includes/ADAO.php");
$redirectTo="index.php?error_code=1002233986";
$login=$_POST['username'];
$pass=$_POST['password'];
$loginInfo = UsersLogin::Authenticate($login, $pass);
if ($loginInfo->getID()!=0) {
	      $cart = @$_SESSION['cart'];
	  if ($cart) {
		 ADAO::insertCartItemsOnLogin($loginInfo->getID(),$cart); 
		  
	  }
		$_SESSION['id'] = $loginInfo->getID();
		$redirectTo=HOME_USERS;
		}
       
		header("location:".$redirectTo);

?>