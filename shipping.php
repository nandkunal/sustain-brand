<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
$item_name=$_POST['item_name'];
$item_id=$_POST['item_id'];
$cat=$_POST['cat'];
$cost=$_POST['cost'];
$quantity=$_POST['quantity'];
$subtotal=$_POST['subtotal'];
$shipping_option=$_POST['shipping_option'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain Brand</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/colorbox.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.colorbox.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
                         $(".ajax").colorbox();
						
});


function ValidateInputs(frm){
	var error="";
	var ret=true;
	if((frm.fname.value=="")||(frm.lname.value=="")||(frm.address.value=="")||(frm.city.value=="")||(frm.state.value=="")||(frm.zip.value=="")||(frm.tel.value=="")||(frm.email.value=="")){
	error+="\nRequired Fields Cannot be Empty";
}

 if((isNaN(frm.zip.value))||(isNaN(frm.tel.value))){
	 error+="\n Invalid Input Format";
 }

if(!isZipValid(frm.zip.value)){
	 error+="\n Invalid Zip";
}
	
	
	
	if(error!=""){
		
	alert("Following Errors Occured"+error);
	ret=false;	
		
	}
	

	
	return ret;
	
}
function isZipValid(zip){


var response=$.ajax({
							  type:"POST",
							  url:"checkZipValid.php",
							  data:"zip="+zip,
							  dataType: 'html',
							  context: document.body,
							  global: false,
							  async:false,
							  success:function(data){
								 
								}
							  }).responseText;
	 	 
if(response==1)
return true;
else
return false;

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

<div class="order-summary-page"  style="width:700px;">
  <div class="payment-section" style="width:320px; margin-left:20px;">
  <h2>Shipping</h2>
  <form method="post" action="order_confirmation.php" name="ship_form" onsubmit="return ValidateInputs(ship_form)">
<table width="320" border="0" cellspacing="0" cellpadding="0">
  <tr>
   
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="118">First Name*</td>
    <td width="202"><label>
      <input type="text" name="fname" id="fname" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Last Name*</td>
    <td><input type="text" name="lname" id="lname" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address line 1*</td>
    <td><input type="text" name="address" id="address" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City*</td>
    <td><input type="text" name="city" id="city" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>State*</td>
    <td><input type="text" name="state" id="state" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ZIP code*</td>
    <td><input type="text" name="zip" id="zip" /></td>
  </tr>
  <tr>
    <td><input type="hidden" name="shipping_option" value="<?php echo  $shipping_option;?>" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Telephone*</td>
    <td><input type="text" name="tel" id="tel" /></td>
  </tr>
  <tr>
   <td><?php foreach($cat as $c){?><input type="hidden" name="cat[]" value="<?php echo  $c;?>" /><?php }?></td>
    <td><?php foreach($cost as $cst){?><input type="hidden" name="cost[]" value="<?php echo  $cst;?>" /><?php }?></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email*</td>
    <td><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td><?php foreach($item_id as $item){?><input type="hidden" name="item_id[]" value="<?php echo  $item;?>" /><?php }?></td>
    <td><?php foreach($item_name as $name){?><input type="hidden" name="item_name[]" value="<?php echo  $name;?>" /><?php }?></td>
  </tr>
  <tr>
    <td colspan="2">
      <?php foreach($quantity as $qty){?> <input type="hidden" name="quantity[]" value="<?php echo  $qty;?>" /><?php }?>
       <?php foreach($subtotal as $st){?> <input type="hidden" name="subtotal[]" value="<?php echo  $st;?>" /><?php }?>
     </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
</div>
<div class="clr"></div>
<div class="buttons">  
<input name="Cancel" type="submit" value="Cancel"/>  
<input name="Return to Cart" type="submit" value="Return to Cart"/>
<input name="Continue to Checkout" type="submit" value="Continue to Checkout"/>

</div>
</form>
</div>
<div class="copyright">
<ul>
<?php include("common/footer.php");?>
</ul>
</div>
</div>
</body>
</html>
