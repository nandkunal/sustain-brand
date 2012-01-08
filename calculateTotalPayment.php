<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$address=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['city'];
$zip=$_POST['zip'];
$tel=$_POST['tel'];
$email=$_POST['email'];
 $row=ADAO::getSalesTaxByZip($zip);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain Brand</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
<div class="left-section">
<div class="logo"><img src="images/logo.png" alt="logo" /></div>
<div class="left-nav">
<b>Sustain Brand</b>
<ul>
<li><a href="#">AMISH NOODLES</a></li>
<li><a href="#">AMISH JAMS</a></li>
<li><a href="#">GELATO</a></li>
<li><a href="#">JAR SALSA</a></li>
<li><a href="#">FRESH SALSA</a></li>
<li><a href="#">NUTRA-RICH SOUP</a></li>
<li><a href="#">SORBET</a></li>
<li><a href="#">SOUP</a></li>
<li><a href="#">12 VEGGIE MARINARA</a></li>
</ul>
</div>
<div class="newsletter-section">
<b><img src="images/e-newsletter-img.png" alt="enewsletter" /></b>
<span>
<label>
Hop on our e-news for new product launches and great gift ideas.
</label>
<input name="" type="text" value="Enter your email here" />
<i>See our other newsletters.</i>
</span>
</div>
</div>
<div class="right-section">
<div class="order-summary-page">
<div class="order-summary-section">
<h2>Your order summary</h2>
<ul>
<li>
    <span>Description</span>
    <i>Quantity</i>
    <u>Amount</u>
</li>
<li>
    <span><b>Mango Pineapple (Med)</b><br />16oz Tubs<br />Individual</span>
    <i>1</i>
    <u>$3.86</u>
</li>
<li>
    <span><b>Item Total:</b><br /> Shipping and handling</span>
    <i></i>
    <u>$3.86<br />
$0.90</u>
</li>
<li>
    <span><b>Total (USD)</b></span>
    <i></i>
    <u><b>$4.76</b></u>
</li>
</ul>
</div>
<div class="payment-section">
<h2>Payment</h2>
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
    <td>First Name</td>
    <td><input type="text" name="fname" id="fname" value="<?php echo $fname;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td><input type="text" name="lname" id="lname" value="<?php echo $lname;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Address line 1</td>
    <td><input type="text" name="address" id="address"  value="<?php echo $address;?>"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="city" id="city" value="<?php echo $city;?>" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>State</td>
    <td><input type="text" name="state" id="state" value="<?php echo $state;?>" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Country</td>
    <td><input type="text" name="country" id="country" value="<?php echo $row['country_name'];?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ZIP code</td>
    <td><input type="text" name="zip" id="zip" value="<?php echo $zip;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Telephone</td>
    <td><input type="text" name="tel" id="tel" value="<?php echo $tel;?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input type="text" name="email" id="email" value="<?php echo $email;?>" /></td>
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


</div>


</div>
</div>
<div class="copyright">
<ul>
<li>&copy; 2011 SUSTAIN BRAND</li>
<li>110 Front Street Cincinnati, Ohio 45157</li>
<li>Contact 513.381.4900</li>
<li><a href="mailto:info@sustainbrandonline.com">info@sustainbrandonline.com</a></li>
<li><a href="http://sustainbrand.com">sustainbrand.com</a></li>
</ul>
</div>
</div>
</body>
</html>
