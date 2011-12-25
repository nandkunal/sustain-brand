<?php
ob_start();
session_start();
require_once("includes/loginManager.php");
$redirectTo="index.php?error_code=1002233986";
$login=$_POST['username'];
$pass=$_POST['password'];
$loginInfo = LoginInfo::Authenticate($login, $pass);
echo $loginInfo->getID();
if ($loginInfo->getID()!=0) {
		$_SESSION['id'] = $loginInfo->getID();
		$redirectTo=HOME_ADMIN;
		}
       
		header("location:".$redirectTo);

?>