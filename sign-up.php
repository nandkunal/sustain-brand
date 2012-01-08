<?php
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain Brand</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function check(frm){
  var error="";
  var res=true;
  if((frm.fname.value=="")||(frm.email.value=="")||(frm.password.value=="")||(frm.cpassword.value=="")||(frm.username.value=="")){
	   error+="Please fill all the fields\n";
  }
  
  if(frm.password.value!=frm.cpassword.value){
	  error+="Password Mismatch";
  }
  if(error!=""){
	  alert("Error\n"+error);
	  res=false;
  }
  
  return res;
	
	
	
	
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
<h3>
<?php include("common/top_text.php");?>
</h3>
<div class="main-nav">
<ul>
<?php include("common/main_nav.php");?>
</ul>
</div>
<div class="account-form-page">

<div class="payment-section">
<h2>Create an account to complete your purchase.</h2>
<div class="close"></div>
<table width="320" border="0" cellspacing="0" cellpadding="0">
<form method="post" action="registration.php" onsubmit="return check(login_form)" name="login_form" id="login_form">
  <tr>
    <td>First Name</td>
  </tr>
  <tr>
    <td width="202"><label>
      <input type="text" name="fname" id="fname" />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>Last Name</td>
  </tr>
  <tr>
    <td><input type="text" name="lname" id="lname" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Your Email</td>
  </tr>
  <tr>
    <td><input type="text" name="email" id="email" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
  </tr>
  <tr>
    <td><input type="password" name="password" id="password" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Confirm Password</td>
  </tr>
  <tr>
    <td><input type="password" name="cpassword" id="cpassword" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Username</td>
  </tr>
  <tr>
    <td><input type="text" name="username" id="username" /></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <input name="Register" type="submit" value="Register"/></td>
    </tr>
    </form>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>


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
