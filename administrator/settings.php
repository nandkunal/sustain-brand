<?php 
session_start();
//include('authen.php');
require_once('includes/ADAO.php');
if(isset($_POST['submit'])){
	
$res=ADAO::changePassword($_POST['opwd'],$_POST['npwd']);
if($res==1){
	$message="Password Updated Successfully";
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
	var error="";
	var ret=true;
if((frm.opwd.value=="")||(frm.npwd.value=="")||(frm.cpwd.value=="")){
	error+="Please fill all the fields\n";
	
}
if(frm.npwd.value!=frm.cpwd.value){
	error+="Password Mismatch";
}
if(error!="")
{
alert("Error!"+error);
ret=false;	
}
return ret;
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
                        <td colspan="2"><h2>Change Password</h2></td>
                        </tr>
                        <tr>
                        <td colspan="2" align="center"><?php if(isset($_POST['submit'])){ echo $message;}?></td>
                        </tr>
                         <form id="settings_form" name="settings_form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return check(settings_form)">
                        <tr>
                         <td><label for="opwd">Old Password*</label></td>
                         <td><input class="input-small" type="password" id="opwd" name="opwd" /></td>
                         </tr>
                          <tr>
                         <td><label for="newpwd">New Password*</label></td>
                         <td><input class="input-small" type="password" id="npwd" name="npwd" /></td>
                         </tr>
                           <tr>
                         <td><label for="cpwd">Confirm Password*</label></td>
                         <td><input class="input-small" type="password" id="cpwd" name="cpwd" /></td>
                         </tr>
                         <tr>
                         <td align="center" colspan="2"><input class="button" name="submit" type="submit" value="Update" /></td>
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
