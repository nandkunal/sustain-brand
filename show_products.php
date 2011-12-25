<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
 $id_main=$_GET['id_main'];
$brand_id_main=$_GET['brand_id_main'];
if($auth){
$userDetails=ADAO::getUserDetails($_SESSION['id']);	
	
}
$details=ADAO::getAllProductsByCat($id_main,$brand_id_main);
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
<script>
$(document).ready(function(){
	$(".individual_cost").click(function(){
		                                   var id_ind=$(this).attr("id");
										    $.ajax({
																type:"POST",
																url:"addtocart.php",
																data:"item_id="+id_ind+"&case="+1,
																success:function(data){
																						$("#buy_text_individual").html(data);	
																					    }
																     });
										   
										   
	                                      });
	
	
	$(".case_discount").click(function(){
		                                   var id_case=$(this).attr("id");
										    $.ajax({
																type:"POST",
																url:"addtocart.php",
																data:"item_id="+id_case+"&case="+2,
																success:function(data){
																							$("#buy_text_case").html(data);
																					    }
																     });
										   
										   
	                                      });										  
										  
	
});

</script>
</head>
<body>
<div id="wrapper">
<div class="left-section">
<div class="logo"><img src="images/logo.png" alt="logo" /></div>
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
<div class="breadcrumb">
<ul>
<li><a href="#">Sustain Brand</a></li>
<li><a href="#">Fresh Salsa</a></li>
<li><a href="#">Mango Pineapple Medium</a></li>
</ul>
</div>
<div class="product-list-display">
<ul>
<?php foreach($details as $det){?>
<li>
<div class="image-box"><img src="<?php echo $det['image_product_display'];?>" alt="product1" /></div>
<div class="product-description">
<b><?php echo $det['item_name'];?></b><br />
<?php echo $det['item_sub_title'];?><br /><br />
<?php echo htmlspecialchars($det['item_description'],ENT_QUOTES);?>
</div>
<div class="cost-display">
<b>Individual</b><i>$<?php echo $det['item_cost'];?></i><u><a href="#" style="text-decoration:none; color:#107144;" id="<?php echo $det['id'];?>" class="individual_cost"><span id="buy_text_individual">BUY NOW</span></a></u>
<b>Case Discount</b><i>$<?php echo $det['item_discount'];?></i><u><a href="#" style="text-decoration:none;color:#107144;" id="<?php echo $det['id'];?>" class="case_discount"><span id="buy_text_case">BUY NOW</span></a></u>
</div>
</li>
<?php }?>
</ul>
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
