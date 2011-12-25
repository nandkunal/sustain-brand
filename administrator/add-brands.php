<?php 
session_start();
//include('authen.php');
require_once('includes/ADAO.php');
if(isset($_POST['submit'])){
	
$res=ADAO::addBrands($_POST['name']);
if($res==1){
	$message="Brand Added Successfully";
}
else
{
	$message="Error!!,Please try Again";
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin-Home</title>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="js/chrome.js"></script>
<script>
function check(frm){
if((frm.name.value=="")){
	alert("Please Enter  Branch Name");
	return false;
}
}
</script>
</head>

<body>
    <table height="318" width="900px" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" id="content_tbl">
      
        <tr>
            <td  style="vertical-align:top">
                <table height="30px" width="900px" cellpadding="0" cellspacing="0" align="center" style="vertical-align:top">
                    <tr>
                       <td><?php include("common/top_nav.php");?></td>
                      

                    </tr>
                    <tr>
                        <td align="center" colspan="6">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" colspan="6">Welcome Admin</td>
                    </tr>
                     <tr>
                        <td align="center" colspan="6" height="200px"><!--DashBoard Section-->
                        
                        <table height="200px" cellpadding="0" cellspacing="20px" align="center">
                        <tr>
                        <td colspan="2"><h2>Add Brands</h2></td>
                        </tr>
                        <tr>
                        <td colspan="2" align="center"><?php if(isset($_POST['submit'])){ echo $message;}?></td>
                        </tr>
                         <form id="add_branch_form" name="add_branch_form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return check(add_branch_form)">
                        <tr>
                         <td><label for="name">Name of the Brand*</label></td>
                         <td><input class="input-small" id="name" name="name" /></td>
                         </tr>
                     
                         <tr>
                         <td align="center" colspan="2"><input class="button" name="submit" type="submit" value="Add" /></td>
                         </tr>
                         </form>
                         
                        </table>
                        </td>
                    </tr
                    ><tr>
                        <td align="center" colspan="6"><?php include("common/footer.php");?></td>
                    </tr>    
                </table>
            </td>
        </tr>
    
    </table>

</body>
</html>
