<?php
$res1=ADAO::viewBrands();

?>
<?php foreach($res1 as $row1){
	?>
<div class="left-nav">

<b><?php echo $row1['value'];?></b>
<?php
 $res2=ADAO::getProductCategoriesByBrand($row1['id']);
if(is_array($res2)){
	
?>
<ul>
<?php foreach($res2 as $row2){?>
<li><a href="show_products.php?id_main=<?php echo $row2['id'];?>&brand_id_main=<?php echo $row2['brand_id'];?>"><?php echo $row2['value'];?></a>
<?php
if((isset($_GET['id_main']))&&(isset($_GET['brand_id_main']))){
	if(ADAO::isProductsExists($row2['id'])){
		
	$res3=ADAO::getAllProductsByCat($row2['id'],$brand_id_main);
	if(is_array($res3)){
		
		?>
     
<ul>
<?php foreach($res3 as $row3){?>
<li><a href="product_detail.php?id=<?php echo $row3['id'];?>&cat_id=<?php echo $row3['cat_id'];?>&brand_id=<?php echo $row3['brand_id'];?>"><?php echo $row3['item_name'];?></a></li>

<?php }?>

</ul></li>
<?php
		
		
		
	}
	
	}

}

?>

<?php }?>
</ul>
<?php }?>
</div>
<?php }?>