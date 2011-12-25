<?php 
session_start();
//include('authen.php');
require_once('includes/ADAO.php');
require_once("includes/clsSimpleImage.php");
require_once("includes/projectConstant.php");
$image = new SimpleImage();
$name=$_POST['name'];
$brand=$_POST['brand'];
$cat=$_POST['cat'];
$qt=$_POST['item_qt'];
$des=$_POST['prod-des'];
$cost=$_POST['prod-cost'];
$case=$_POST['prod-dis'];
$file=$_FILES["file"]["name"];
$cat_file_path_large="../products/large";
$cat_file_path_large_abs="products/large";
$cat_file_path_thumb="../products/thumb";
$cat_file_path_thumb_abs="products/thumb";
$cat_file_path_display="../products/display";
$cat_file_path_display_abs="products/display";
 move_uploaded_file($_FILES["file"]["tmp_name"],
      $cat_file_path_large."/".$file);
/**
1.Copy the large Image to location
2.Load it
3.Resize it
4.Save it.
5.Assign Read,Write and Execute Permission

**/	
copy($cat_file_path_large."/".$file,$cat_file_path_display."/".$file);
$image->load($cat_file_path_display."/".$file);
$image->resize(100,72);
$image->save($cat_file_path_display."/".$file);
chmod ($cat_file_path_display."/".$file ,0755);  
	  
copy($cat_file_path_large."/".$file,$cat_file_path_thumb."/".$file);
$image->load($cat_file_path_thumb."/".$file);
$image->resize(185,123);
$image->save($cat_file_path_thumb."/".$file);
chmod ($cat_file_path_thumb."/".$file ,0755);
$image->load($cat_file_path_large."/".$file);
$image->resize(273,205);
$image->save($cat_file_path_large."/".$file);
chmod ($cat_file_path_large."/".$file ,0755);
$res=ADAO::addProducts($name,$brand,$cat,$qt,$des,$cost,$case,$cat_file_path_display_abs."/".$file,$cat_file_path_thumb_abs."/".$file,$cat_file_path_large_abs."/".$file);
if($res==1){
	?>
	<script>
	alert("Item Inserted Successfully ");
	window.location.href="home.php";
	</script>
    <?php
}else{?>
	
	<script>
	alert("Error!!");
	window.location.href="home.php";
	</script>
	<?php
	
}

