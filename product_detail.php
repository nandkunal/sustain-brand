<?php
session_start();
require_once("administrator/includes/ADAO.php");
require_once("administrator/includes/UserFunctions.php");
$auth=UserFunctions::isUserAuthenticated();
if($auth){
$userDetails=ADAO::getUserDetails($_SESSION['id']);	
	
}
$row=ADAO::viewProductDetail($_GET['id'],$_GET['cat_id'],$_GET['brand_id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain Brand</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js" type="text/javascript"></script>
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
																data:"item_id="+id_case+"&case="+2 ,
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
<div class="breadcrumb">
<ul>
<li><a href="#">Sustain Brand</a></li>
<li><a href="#">Fresh Salsa</a></li>
<li><a href="#">Mango Pineapple Medium</a></li>
</ul>
</div>
<div class="product-display-3rd-level">
<div class="product-content">
<div class="product-image"><img src="<?php echo $row['item_url_large'];?>" alt="<?php echo $row['item_name'];?>" /></div>
<p>
<?php echo $row['item_description'];?>
</p>

</div>
<div class="content">
<span>
<b><?php echo $row['item_name'];?></b><br />
<?php echo $row['item_name'];?><br /><br />
<?php echo htmlspecialchars($row['item_description'],ENT_QUOTES);?>
<br />
<br class="clr" />

<label>Individual</label><i>$<?php echo $row['item_cost'];?></i><u><a href="#" style="text-decoration:none; color:#107144;" id="<?php echo $row['id'];?>" class="individual_cost"><span id="buy_text_individual">BUY NOW</span></a></u>
<br class="clr" />
<label>Case Discount</label><i>$<?php echo $row['item_discount'];?></i><u><a href="#" style="text-decoration:none;color:#107144;" id="<?php echo $row['id'];?>" class="case_discount"><span id="buy_text_case">BUY NOW</span></a></u>
<br class="clr" />
<p>All orders distributed by Sustain Brand LLC.<br />
Shipments are made weekly, or as needed.<br /><br />
Shelf Life: 11 days refrigerated
</p>
</span>



</div>
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
