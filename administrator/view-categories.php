<?php 
session_start();

require_once('includes/ADAO.php');
$res=ADAO::viewCategory();
//include('authen.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin-Home</title>
<link href="css/style.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" href="chrometheme/chromestyle.css" />
<script type="text/javascript" src="js/chrome.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".edit_link").click(function(){
		console.info("clicked");
		var id=$(this).attr("id");
		console.info(id);
		
        $("#value_"+id).hide();
		$("#brand_"+id).hide();
		
		$("#value_input_"+id).show();
		$("#brand_input_"+id).show();
		
		$("#edit_save").show();
		$("#save_data").click(function(){
			
			console.info("save button clicked");
			var value=$("#value_input_"+id).val();
			console.info(value);
			
			var dataString = 'id='+ id +'&value='+value;
			if(value.length>0)
				{
				
				$.ajax({
				type: "POST",
				url: "admin_user.php",
				data: dataString,
				cache: false,
				success: function(html)
				{ 
				console.info(html);
				
				window.location.href="admin_account_manager.php";	
				}
				
				});
				}
				else
				{
				alert('Enter something.');
				}
			
		

	});
	});
	// Edit input box click action
$(".editbox").mouseup(function()
{
return false
});
$(document).mouseup(function()
{
$(".editbox").hide();
$(".text").show();
$("#edit_save").hide();
});


// Outside click action


});

function createAccount(){
	
window.location.href="add-brands.php";	
	
}
function toggleChecked(status)
 {
$(".check").each( function() {
$(this).attr("checked",status);
var tex=status?"Deselect":"Select";
$("#status").text(tex);
});
}
function validate()
{
var chks = document.getElementsByName('id[]');
var checkCount = 0;
for (var i = 0; i < chks.length; i++)
{
if (chks[i].checked)
{
checkCount++;
}
}
if (checkCount > 0)
{

return true;
}
else{
	alert("Select atleast one Account");
return false;
}
}
</script>
</head>

<body>
    <table height="318" width="1000px" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" id="content_tbl">
      
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
                        <td align="center" colspan="6" height="auto">
                        <table height="auto" cellpadding="0" cellspacing="0" align="center" id="view_reservation_tbl">
                        <thead>
                        <th width="106"><input type="checkbox" name="checkall" value="checkall" id="checkall" onClick="toggleChecked(this.checked)"><span id="status">Select</span></th>
                        <th width="141">CAT ID</th>
                        <th width="165">NAME</th>
                         <th width="165">BRAND </th>
                       <th width="168">Actions</th>
                       
                        <tbody>
                        <?php 
						   $count=0;  
						   foreach($res as $row){
                            switch($count){
                            case 0:
                            $class="odd";
							break;
							case 1:
							$class="even";
							break;
							}
							?>
                            <form method="post" action="apply_action.php" onsubmit="return validate();">
                        <tr class="edit_tr" id="<?php echo $row['id'];?>">
                        <td class="<?php echo $class;?>"><input type="checkbox" name="id[]" value="<?php echo $row['id'];?>" class="check" id="<?php echo $row['id'];?>"></td>
                        <td class="<?php echo $class;?>"><?php echo $row['id'];?></td>

                         <td class="<?php echo $class;?>"><span id="value_<?php echo $row['id'];?>" class="text"><?php echo $row['value'];?></span><input type="text" value="<?php echo $row['value'];?>" class="editbox" id="value_input_<?php echo $row['id'];?>"/></td> 
                                               <td class="<?php echo $class;?>"><span id="brand_<?php echo $row['brand_id'];?>" class="text"><?php echo ADAO::getBrandById($row['brand_id']);?></span><select size="1" class="editbox" id="brand_input_<?php echo $row['id'];?>" ><option value="<?php echo $row['brand_id'];?>" selected="selected"><?php echo ADAO::getBrandById($row['brand_id']);?></option>
                                              <?php  $res1=ADAO::viewBrands();
											   foreach($res1 as $row1){
												   ?>
<option value="<?php echo $row1['id'];?>"><?php echo $row1['value'];?></option>
                                                 <?php }?>                                                  
                                                </select></td>
                         <td class="<?php echo $class;?>"><a href="#" id="<?php echo $row['id'];?>" class="edit_link">Edit</a></td>
                        </tr>
                        <?php $count++;if($count>1){$count=0;} }?>
                             
                        
                        </tbody>
                        <tfoot>
                        <tr>
                        <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr id="edit_save">
                         <td colspan="6" align="right"><input class="button" name="save" type="button" value="Save" id="save_data" /></td>
                         </tr>
                            <tr>
                        <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                         <td colspan="6" align="right"><input class="button" name="delete" type="submit" value="delete"/></td>
                         </tr>
                         </form>
                          <tr>
                        <td colspan="6">&nbsp;</td>
                        </tr>
                        <tr>
                         <td colspan="6" align="right"><input class="button" name="submit" type="button" value="Add Category" onclick="createAccount();" /></td>
                         </tr>
                        </tfoot>
                        
                        </table>
                        
                        </td>
                    </tr> 
                      <tr>
                        <td align="center" colspan="6"><?php include("common/footer.php");?></td>
                    </tr>    
                </table>
            </td>
        </tr>
    
    </table>

</body>
</html>

