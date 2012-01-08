<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
$zip=$_POST['zip'];
$res=ADAO::isZipValid($zip);
if($res){
	echo 1;
}
else echo 2;