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
$zip=$_POST['zip'];
$shipping_option=$_POST['shipping_option'];
$sales_tax=ADAO::getSalesTaxByZip($zip);
$shipping_values= ADAO::getShippingDetailsById($shipping_option);

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
                        
						
});
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
<div class="order-summary-section">
<h2>Your order summary</h2>
<ul>
<li>
    <span>Description</span>
    <i>Quantity</i>
    <u>Amount</u>
</li>
<?php 
$i=0;
$sum=0;
foreach($item_name as $name){?>
<li>
    <span><b><?php echo $name?></b><br /><?php if($cat[$i]==1) echo "Individual"; else echo "Case Discount";   ?></span>
    <i><?php echo $quantity[$i];?></i>
    <u>$<?php $newcost=$cost[$i]*$quantity[$i]; echo $newcost;?></u>
</li>

<?php $sum=$sum+$newcost; $i++; }?>
<li>
    <span><b>Item Total:</b><br /> Shipping and handling</span>
    <i></i>
    <u>$<?php echo $sum;?><br />
$<?php $ship_cost=$shipping_values['method_cost']; echo $ship_cost;?></u>
</li>
<li>
    <span><b>Total (USD)</b><br /> Sales Tax</span>
    <i></i>
    <u><b>$<?php $total_cost=$ship_cost+$sum; echo $total_cost; ?></b><br />
    <?php echo $sales_tax['sales_tax'];?>
    </u>
</li>
<li>
    <span><b>Total Billing Amount (USD)</b></span>
    <i></i>
    <u><b>$<?php $bill_amount=$total_cost+($total_cost*$sales_tax['sales_tax']); echo $bill_amount;?></b>
    </u>
</li>
</ul>
</div>
<div class="payment-section">
<h2>Payment</h2>
<form method="post" action="transaction.php" name="pay_form" onsubmit="checkPaymentValidation(pay_form)">
<table width="320" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="118">Credit Card Number</td>
    <td width="202"><label>
      <input type="text" name="textfield" id="textfield" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>mm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;yy</td>
  </tr>
  <tr>
    <td>Expiration Date</td>
    <td>
    <input type="text" name="textfield" id="textfield" class="txt-small" /> 
    <input type="text" name="textfield" id="textfield" class="txt-small" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
 <tr>
    <td>CCV*</td>
    <td><input type="text" name="ccv" id="ccv" /></td>
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
    <td>Country*</td>
    <td><input type="text" name="country" id="country" /></td>
  </tr>
  
  <tr>
    <td><input type="hidden" name="billing_amount" value="<?php echo $bill_amount;?>"</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ZIP code*</td>
    <td><input type="text" name="zip" id="zip" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
    <input name="Review and Continue" type="submit" value="Review and Continue"/>
        <input name="Cancel" type="submit" value="Cancel"/>
    
    </td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</div>


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
