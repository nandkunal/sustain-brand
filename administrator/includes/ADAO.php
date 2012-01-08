<?php
require_once('projectConstant.php');
require_once('DBUtil.php');
class ADAO extends DBUtil
{
public static function addBrands($name){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$stmt=$dbh->prepare("CALL ".SP_BRANDS."(?)");
$stmt->bindParam(1,$name);
$stmt->execute();
$row=$stmt->fetch();
$dbh=null;
return $row['res'];

}

public static function viewBrands(){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
     $stmt=$dbh->prepare("select * from t_brand_details");
          $stmt->execute();
         $row=$stmt->fetchAll();
        $dbh=null;
return $row;
}
	
public static function viewCategory(){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
     $stmt=$dbh->prepare("select * from t_product_cat");
          $stmt->execute();
         $row=$stmt->fetchAll();
        $dbh=null;
return $row;	
	
}
public static function getBrandById($id){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$stmt=$dbh->prepare("CALL ".SPGET_BRAND_NAME."(?)");
$stmt->bindParam(1,$id);
$stmt->execute();
$row=$stmt->fetch();
$dbh=null;
return $row['brand_name'];	
	
	
}
public static function changePassword($opwd,$npwd){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$opwd=md5($opwd);
$npwd=md5($npwd);
$stmt=$dbh->prepare("CALL ".SPGET_UPD_PWD."(?,?)");
$stmt->bindParam(1,$opwd);
$stmt->bindParam(2,$npwd);
$stmt->execute();
$row=$stmt->fetch();
$dbh=null;
return $row['res'];		
	
	
}
public static function FrontPageProducts(){
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
     $stmt=$dbh->prepare("select id,cat_id,brand_id,item_name,item_url_thumb from t_product_details order by id desc limit 6");
          $stmt->execute();
         $row=$stmt->fetchAll();
        $dbh=null;
return $row;


}

public static function viewProductDetail($id,$cat_id,$brand_id){
		try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
     $stmt=$dbh->prepare("select * from  t_product_details where id=".$id." and cat_id=".$cat_id." and brand_id=".$brand_id."");
          $stmt->execute();
         $row=$stmt->fetch();
        $dbh=null;
return $row;

	
	
	
}
public static function createAccount($fname,$lname,$email,$pass,$username){
	
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$stmt=$dbh->prepare("CALL ".SP_CREATE_ACC."(?,?,?,?,?)");
$stmt->bindParam(1,$username);
$stmt->bindParam(2,$pass);
$stmt->bindParam(3,$fname);
$stmt->bindParam(4,$lname);
$stmt->bindParam(5,$email);
$stmt->execute();
$row=$stmt->fetch();
$dbh=null;
return $row['res'];		
	
}

public static function getUserDetails($id){
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
     $stmt=$dbh->prepare("select * from t_users_account where id=".$id."");
          $stmt->execute();
         $row=$stmt->fetch();
        $dbh=null;
return $row;
}

public static function getItemDetailsById($item_id){
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
     $stmt=$dbh->prepare("select item_name,item_cost,item_discount from t_product_details where id=".$item_id."");
          $stmt->execute();
         $row=$stmt->fetch();
        $dbh=null;
return $row;	
	
	
}
public static function getCostofItemByCat($item_id,$cat){
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$stmt=$dbh->prepare("CALL  SP_GET_ITEM_COST_BY_CASE(?,?)");
$stmt->bindParam(1,$cat);
$stmt->bindParam(2,$item_id);
$stmt->execute();
$row=$stmt->fetch();
$dbh=null;
return $row['res'];		
}

public static function getProductCategoriesByBrand($brand_id){
		try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

  $stmt=$dbh->prepare("select * from t_product_cat where brand_id=?");
  $stmt->bindParam(1,$brand_id);
   $stmt->execute();
       $row=$stmt->fetchAll();
	    $dbh=null;
return $row;
	
	
	
}
public static function getAllProductsByCat($cat_id,$brand_id){
	
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

  $stmt=$dbh->prepare("select * from t_product_details where cat_id=? and brand_id=?");
  $stmt->bindParam(1,$cat_id);
   $stmt->bindParam(2,$brand_id);
   $stmt->execute();
       $row=$stmt->fetchAll();
	    $dbh=null;
return $row;
		}
		
public static function isProductsExists($cat_id){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

$stmt=$dbh->prepare("CALL ".SP_PROD_EXISTS."(?)");
$stmt->bindParam(1,$cat_id);
$stmt->execute();
$row=$stmt->fetch();
$dbh=null;
return $row['res'];		
	
	
}

public static function addProducts($name,$brand,$cat,$qt,$des,$cost,$case,$display,$thumb,$large){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
  $des=htmlspecialchars($des,ENT_QUOTES);
  $stmt=$dbh->prepare("INSERT into t_product_details values(NULL,".$cat.",".$brand.",'".$name."','".$qt."','".$des."','".$display."','".$thumb."','".$large."',".$cost.",".$case.")");
 
   $stmt->execute();
      
	    $dbh=null;
return 1;	
	

	
}

public static function insertCartItemsOnLogin($user_id,$cart){
	
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$cart_items=explode(",",$cart);
if(count($cart_items)==1){
     $item_id=substr($cart_items,0,strlen($cart_items)-1) ;
	 $cat=substr($cart_items,-1);
	$cost=ADAO::getCostofItemByCat($item_id,$cat);
	//echo "Cost is ". $cost;
  $stmt=$dbh->prepare("INSERT into t_users_cart values(NULL,".$user_id.",".$item_id.",".$cat.",".$cost.")");
   $stmt->execute();	
}
else
{
	

foreach($cart_items as $item){
	 $item_id=substr($item,0,strlen($item)-1) ;
	 $cat=substr($item,-1);
$cost=ADAO::getCostofItemByCat($item_id,$cat);
   $stmt=$dbh->prepare("INSERT into t_users_cart values(NULL,".$user_id.",".$item_id.",".$cat.",".$cost.")");
   $stmt->execute();
   $stmt=null;
   $item_id=0;
   $cat=0;
}
}
  
      
	    $dbh=null;
	
}



public static function inserCartItemsLoggedIn($user_id,$cart){
	
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

     $item_id=substr($cart,0,strlen($cart)-1) ;
	 $cat=substr($cart,-1);
	$cost=ADAO::getCostofItemByCat($item_id,$cat);
	//echo "Cost is ". $cost;
  $stmt=$dbh->prepare("INSERT into t_users_cart values(NULL,".$user_id.",".$item_id.",".$cat.",".$cost.")");
   $stmt->execute();	

  
      
	    $dbh=null;
	
}

public static function viewBasketItemDetails($item_id,$cat){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
if($cat==1){
	
  $stmt=$dbh->prepare("select id,cat_id,brand_id,item_name,	image_product_display,item_cost,item_url_thumb from t_product_details where id=?");
  
}
else
{
  $stmt=$dbh->prepare("select id,cat_id,brand_id,item_name,	image_product_display,item_discount,item_url_thumb from t_product_details where id=?");	
}
  $stmt->bindParam(1,$item_id);
  
   $stmt->execute();
       $row=$stmt->fetch();
	    $dbh=null;
return $row;	
	}
	
	
public static function getSalesTaxByZip($zip){
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$stmt=$dbh->prepare("select * from t_sales_list where country_zip=?");
 $stmt->bindParam(1,$zip);
  
   $stmt->execute();
       $row=$stmt->fetch();
	    $dbh=null;
return $row;
  
}
	
public static function isZipValid($zip){
	
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$stmt=$dbh->prepare("select * from t_sales_list where country_zip=?");
 $stmt->bindParam(1,$zip);
  
   $stmt->execute();
       $count=$stmt->rowCount();
	    $dbh=null;
if($count>0){
	return true;
}
else{
	return false;
}
	
	
	
}

public static function getAllShippingMethods(){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

  $stmt=$dbh->prepare("select * from t_shipping_method");
  
   $stmt->execute();
       $row=$stmt->fetchAll();
	    $dbh=null;
return $row;	
		
}

public static function getShippingDetailsById($id){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

  $stmt=$dbh->prepare("select * from t_shipping_method where id=".$id."");
  
   $stmt->execute();
       $row=$stmt->fetch();
	    $dbh=null;
return $row;	
		
	
	
}

public static function getUserCartItemIdDetails($user_id){
	
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

  $stmt=$dbh->prepare("select concat(item_id,item_case) as data from t_users_cart where user_id=".$user_id."");
  
   $stmt->execute();
       $row=$stmt->fetchAll();
	    $dbh=null;
return $row;	
	
	
	
	
}
public static function getItemsCountInCart($id){
try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

  $stmt=$dbh->prepare("select * from t_users_cart where user_id=".$id."");
  
   $stmt->execute();
     $no_items= $stmt->rowCount();
	    $dbh=null;
return $no_items;	
	
	
	
}
public static function deleteItemsfromBasket($id,$item_id_cat){
	
	try
{
$dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

}
catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
$item_id=substr($item_id_cat,0,strlen($item_id_cat)-1) ;
	    $cat=substr($item_id_cat,-1);

  $stmt=$dbh->prepare("delete from t_users_cart where item_id=".$item_id." and item_case=".$cat." and user_id=".$id."");
  
   $stmt->execute();
       
	    $dbh=null;

	return true;
	
}



	
}
	








?>