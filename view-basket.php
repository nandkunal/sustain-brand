<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();

	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
$("#close_continue").click(function(){
	$.colorbox.close()
});
$("#cancel").click(function(){
	$.colorbox.close()
});

  $(".place_order").colorbox();

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain Brand</title>

<style type="text/css">
div#wrapper{width:450px;
}
div#wrapper1{width:700px;
}
div#wrapper div.basket-item-popup{float:left; width:438px; height:190px; color:#985a31; background: url(images/certified-local.png) no-repeat right center; border:6px solid #fff}
div#wrapper div.basket-item-popup div.basket{float:left; display:block; background: url(images/nav-btn-bg.png) repeat-x top left; padding:3px 17px;}
div#wrapper div.basket-item-popup div.basket img{float:left; display:block; padding-left:3px; margin-top:-8px;}

div#wrapper div.basket-item-popup div.item-number{float:left; display:block; color:#a84d10; font-size:13px; text-decoration:none; font-weight:normal; margin:20px;}

div#wrapper div.basket-item-popup .close{float:left; width:11px; height:11px; margin:25px 0 0 150px;}

div#wrapper div.basket-item-popup div.message{float:left; display:block; color:#a84d10; font-size:13px; text-decoration:none; font-weight:normal; margin:20px; width:300px;}
div#wrapper div.basket-item-popup input#close_continue{display:block; background: url(images/main-nav-bg.png) repeat-x; padding:3px 8px; border:none; border-radius:8px; -moz-border-radius:8px; -webkit-border-radius:8px; font-size:13px; float:left; margin-right:10px; color:#974c00; margin:20px; cursor:pointer}







</style>
</head>
<body>



<div id="wrapper">
<div class="basket-item-popup">
<div class="basket"><b>Basket</b><img src="images/basket-img.png" alt="basket" /></a></div>

<div class="close"></div>
<div class="message">There are no items in your basket.</div>
 <input name="Register" type="submit" value="Continue Shopping" id="close_continue"/>
</div>

</div>






</body>
</html>
