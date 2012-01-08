<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain Brand</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#close_continue{display:block; background: url(images/main-nav-bg.png) repeat-x; padding:3px 8px; border:none; border-radius:8px; -moz-border-radius:8px; -webkit-border-radius:8px; font-size:13px; float:left; margin-right:10px; color:#974c00; margin:20px; cursor:pointer}


</style>
<script src="js/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){
                         $(".remove").click(function(){
							 
							var item_id_cat=$(this).attr("id");
							$("#row_"+item_id_cat).hide();
							
							  $.ajax({  
																type:"POST",
																url:"removefromCart.php",
																data:"item_id_cat="+item_id_cat,
																success:function(data){
																						alert("Item Removed");
																					    }
																     }); 
							 
						 });
						
});


function checkValidation(frm){
	
		
	
	var j=0;
	var length=frm.shipping_option.length;
	for(var i=0;i<length;i++){
		if(frm.shipping_option[i].checked==true){
			j=j+1;
		}
	
	}
	if(j==0){
		
		alert("Please Select atleast one Shipping Option");
		return false;
	}
	
	
}

</script>
 
</head>
<body>
<div id="wrapper">
<div class="left-section">
<div class="logo"><a href="index.php"><img src="images/logo.png" alt="logo" border="0" /></a></div>
<?php include("common/left-nav.php");?>
<?php include("common/newsletter-section.php");?>
</div>
<div class="right-section">
<div class="purchase-process">
<b>Purchase Process</b>
<ul>
<li>
  <a href="#">
  <label><img src="images/purchase-process-img-on.jpg" alt="" /></label>
  <i><img src="images/purchase-process-line-on.jpg" alt="" width="88" height="18px" /></i>
  </a>
</li>
<li>
  <a href="#">
  <label><img src="images/purchase-process-img-on.jpg" alt="" /></label>
  <i><img src="images/purchase-process-line-on.jpg" alt="" width="88" height="18px" /></i>
  </a>
</li>
<li>
  <a href="#">
  <label><img src="images/purchase-process-img-off.jpg" alt="" /></label>
  </a>
</li>
</ul>
</div>

<div class="order-summary-page">
<div class="order-summary-section" style="margin-left:50px; width:600px;">
<h2>BASKET REVIEW</h2>

<?php  
	
if((!$auth)&&(isset($_SESSION['cart']))){
	$cart=$_SESSION['cart'];
 
	$contents=UserFunctions::ExplodeItems($cart);
	$shipping_method=ADAO::getAllShippingMethods();

?>
<form method="post" action="shipping.php" name="cart_form" onsubmit="return checkValidation(cart_form)">
<table width="600" cellspacing="0" class="basket-table">
  <tr>
    <td width="151"><strong>Item</strong></td>
    <td width="99"><strong>Type</strong></td>
    <td width="115"><strong>Item Description</strong></td>
    <td width="46"><strong>Price</strong></td>
    <td width="79"><strong>Quantity</strong></td>
    <td width="66"><strong>Sub Total</strong></td>
    <td width="28">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"><img src="images/orange-divider.jpg" width="600" height="2" /></td>
    </tr>
    <?php foreach($contents as $item_Details=>$qty){
	    $item_id=substr($item_Details,0,strlen($item_Details)-1) ;
	    $cat=substr($item_Details,-1);
		$row=ADAO::viewBasketItemDetails($item_id,$cat);
		?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr id="row_<?php echo $row['id'].$cat;?>">
    <td><img src="<?php echo $row['item_url_thumb'];?>" alt="" width="80px" height="58px" /><input type="hidden" name="item_id[]" value="<?php echo  $row['id'];?>" /></td>
    <td><?php if($cat==1) echo "Individual"; else echo "Case Discount";   ?><input type="hidden" name="cat[]" value="<?php echo $cat;?>" /></td>
    <td><?php echo $row['item_name'];?><input type="hidden" name="item_name[]" value="<?php echo $row['item_name'];?>" /></td>
    <td><?php if($cat==1) $cost=$row['item_cost']; else $cost=$row['item_discount']; echo $cost;
   ?><input type="hidden" name="cost[]" value="<?php echo $cost;?>" /></td>
    <td><input type="text" name="quantity[]" size="2" value="<?php echo $qty;?>" /></td>
    <td><div align="center"><?php $subtotal=$qty*$cost; echo $subtotal;?><input type="hidden" name="subtotal[]" value="<?php echo $subtotal;?>" /></div></td>
    <td><a href="#"id="<?php echo $row['id'].$cat;?>" title="Remove" class="remove"><img src="images/close-btn.png" alt="close btn" border="0" /></a></td>
  </tr>
  <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"><img src="images/orange-divider.jpg" width="600" height="2" /></td>
    </tr>
  <tr>
   <td colspan="7"><img src="images/orange-divider.jpg" width="600" height="2" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Choose Shipping Option</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php foreach($shipping_method as $method){?>
  <tr>
    <td><input name="shipping_option" type="radio" value="<?php echo $method['id'];?>" /> <?php echo $method['method_name'];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>($<?php echo $method['method_cost'];?>)</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <?php }?>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>

  </tr>
</table>



<div class="buttons">  
<input name="Return to Cart" type="submit" value="Continue Shopping" id="continue_shopping" />
<input name="Continue to Checkout" type="submit" value="Place Order"/>
</div>
</form>
<?php } 
else if($auth){
 $no_of_items=ADAO::getItemsCountInCart($_SESSION['id']);	
 if($no_of_items==0){?>
 <table width="600" cellspacing="0" class="basket-table">
<tr>
    <td colspan="7" align="center"><strong>There are 0 items in your Basket.<br />Click  <a href="index.php">here</a> to continue Shopping</strong></td>
   
  </tr>	
	</table>
 <?php   
}
 else
 {   
 	$shipping_method=ADAO::getAllShippingMethods();
     $cart=ADAO::getUserCartItemIdDetails($_SESSION['id']);
	 $content_Array="";
	
	 foreach($cart as $index=>$cartItems){
		 
	 $content_Array.=$cartItems['data'].",";
	 
	 }
	 $cart1=substr($content_Array,0,strlen($content_Array)-1);
	$contents1=UserFunctions::ExplodeItems($cart1);
	
 
 ?>
 <form method="post" action="shipping.php" name="cart_form" onsubmit="return checkValidation(cart_form)">
<table width="600" cellspacing="0" class="basket-table">
  <tr>
    <td width="151"><strong>Item</strong></td>
    <td width="99"><strong>Type</strong></td>
    <td width="115"><strong>Item Description</strong></td>
    <td width="46"><strong>Price</strong></td>
    <td width="79"><strong>Quantity</strong></td>
    <td width="66"><strong>Sub Total</strong></td>
    <td width="28">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"><img src="images/orange-divider.jpg" width="600" height="2" /></td>
    </tr>
    <?php foreach($contents1 as $item_Details=>$qty){
	   $item_id=substr($item_Details,0,strlen($item_Details)-1) ;
	    $cat=substr($item_Details,-1);
		$row=ADAO::viewBasketItemDetails($item_id,$cat);
		 
		?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr id="row_<?php echo $row['id'].$cat;?>">
    <td><img src="images/basket-review-product-img.jpg" alt="" /><input type="hidden" name="item_id[]" value="<?php echo  $row['id'];?>" /></td>
    <td><?php if($cat==1) echo "Individual"; else echo "Case Discount";   ?><input type="hidden" name="cat[]" value="<?php echo $cat;?>" /></td>
    <td><?php echo $row['item_name'];?><input type="hidden" name="item_name[]" value="<?php echo $row['item_name'];?>" /></td>
    <td><?php if($cat==1) $cost=$row['item_cost']; else $cost=$row['item_discount']; echo $cost;
   ?><input type="hidden" name="cost[]" value="<?php echo $cost;?>" /></td>
    <td><input type="text" name="quantity[]" size="2" value="<?php echo $qty;?>" /></td>
    <td><div align="center"><?php $subtotal=$qty*$cost; echo $subtotal;?><input type="hidden" name="subtotal[]" value="<?php echo $subtotal;?>" /></div></td>
    <td><a href="#"id="<?php echo $row['id'].$cat;?>" title="Remove" class="remove"><img src="images/close-btn.png" alt="close btn" border="0" /></a></td>
  </tr>
  <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="7"><img src="images/orange-divider.jpg" width="600" height="2" /></td>
    </tr>
  <tr>
   <td colspan="7"><img src="images/orange-divider.jpg" width="600" height="2" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Choose Shipping Option</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php foreach($shipping_method as $method){?>
  <tr>
    <td><input name="shipping_option" type="radio" value="<?php echo $method['id'];?>" /> <?php echo $method['method_name'];?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>($<?php echo $method['method_cost'];?>)</td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
  </tr>
  <?php }?>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
  </tr>

  </tr>
</table>



<div class="buttons">  

<input name="Return to Cart" type="button" value="Continue Shopping"  id="cancel"/>
<input name="Continue to Checkout" type="submit" value="Place Order" id="place_order"/>
</div>
</form>
	 
	 
<?php	 
 }
	
	
	
}




else {
	
?>	
<table width="600" cellspacing="0" class="basket-table">
<tr>
    <td colspan="7" align="center"><strong>There are 0 items in your Basket.<br />Click  <a href="index.php">here</a> to continue Shopping</strong></td>
   
  </tr>	
	</table>
    
	
	
	
	
<?php }?>

</div>

</div>
<div class="copyright">
<ul>
<?php include("common/footer.php");?>
</ul>
</div>
</div>
</body>
</html>
