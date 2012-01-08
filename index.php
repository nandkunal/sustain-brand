<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
if($auth){
$userDetails=ADAO::getUserDetails($_SESSION['id']);	
	
}
$res=ADAO::FrontPageProducts();


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
<?php if($auth){ include("common/login-section.php");}?>
<h3>
<?php include("common/top_text.php");?>
</h3>
<div class="main-nav">
<ul>
<?php include("common/main_nav.php");?>
</ul>
</div>
<?php include("common/fb-section.php");?>
<div class="showcase">
<ul>
<?php foreach($res as $row){?>
<li><a href="product_detail.php?id=<?php echo $row['id'];?>&cat_id=<?php echo $row['cat_id'];?>&brand_id=<?php echo $row['brand_id'];?>"><img src="<?php echo $row['item_url_thumb'];?>" alt="<?php echo $row['item_name'];?>" border="0" /></a></li>

<?php }?>
</ul>
</div>
<div class="description">
<p>Sustain partners with the highest quality local growers and producers, so you know our premium products are always local to your area. Sustain supports the local
community, economy and caters to local flavor. So dig in and... Eat Your Way to Sustainability!<sup>™</sup></p>
<p><b> For Retailers: Sustain provides a single point of contact for multiple regional products (across category lines). For Local Products: Sustain provides marketing and
consumer recognition for local products that would otherwise find difficulty getting on&#8211;shelf at mainstream retailers.</b></p>
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
