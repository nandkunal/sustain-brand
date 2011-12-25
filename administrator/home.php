<?php 
session_start();
//include('authen.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin-Home</title>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="js/chrome.js"></script>
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
                              <td align="center"><div class="roundbox"><br />
                  <a href="#" title="Quick Reservation" id="quick_reservation"><img src="images/icon.jpg" height="53" width="50" alt="Reservation" border="0" /></a><br />
                 Quick Reports</div></td>
                 
                    <td align="center"><div class="roundbox"><br />
                  <a href="#" title="Quick Search"><img src="images/search.jpg" height="48" width="48" alt="search" border="0" /></a><br />
                  Quick Search </div></td>
                 
                         
                           <td align="center"><div class="roundbox"><br />
                  <a href="add-categories.php" title="Add Category" id="pendingpayments"><img src="images/x-office-spreadsheet.png" height="48" width="48" alt="Pending" border="0" /></a><br />
                
                  Add <br />
                  Category  </div></td>
                 
                      <td align="center"><div class="roundbox"><br />
                  <a href="settings.php" title="Settings" id="settings"><img src="images/preferences-system.png" height="48" width="48" alt="Settings" border="0" /></a><br />
                
                  Settings <br />
                  </div></td>
                 
                         </tr> 
                        
                        
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
