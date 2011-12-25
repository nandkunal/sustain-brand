<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sustain-Brand-Admin Panel</title>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />
<style type="text/css">

</style>
</head>

<body>
<table height="600px" width="900px" cellpadding="0" cellspacing="0" align="center">
  
        <tr>
            <td valign="top"><img src="../images/banner.jpg"></td>
        </tr>
<tr>
    <td valign="middle">
       <table height="200px" width="400px" cellpadding="0" cellspacing="2" align="center" id="login_tbl">
        <tr>
            <td colspan="2" align="center" valign="top"><h1>Login Panel</h1></td>
        </tr>
        <form method="post" action="checkLogin.php" id="frm" name="frm"> 
        <tr>
            <td align="right">Enter Username:</td>
             <td align="left"><input type="text" name="username" /></td>
            
        </tr>
         <tr>
            <td align="right">Enter Password:</td>
             <td align="left"><input type="password" name="password" id="password" /></td>
            
        </tr>
       
         <tr>
            <td align="center" colspan="2"><a href="forget.php">Forgot Password</a></td>
        </tr>
        <tr>
            <td align="center" colspan="2"><input type="submit" name="sbmt" value="Login" /></td>
        </tr> 
        </form>   
       </table>
    </td>
</tr>    
</table>
</body>
</html>
