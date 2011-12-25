<?php
require_once('projectConstant.php');
class DBUtil 
{
var $error;

function DBUtil()
{
$con=mysql_connect(DB_HOSTNAME, DB_LOGIN, DB_PASSWORD) or die("Could Not Connect To DataBase");
if($con)
{
//echo "Database connected successfully";
}
 //$this->con=$con;



$d=mysql_select_db(DB_DATABASE)or die("Could not select database");
if($d)
{
//echo "Database selected";
}

}

function fetch($sql)
	{
		$rs = mysql_query($sql) or die($this->showError(mysql_error(),$sql));

		if(mysql_num_rows($rs)>0)
			return $rs;
		else
			return false;
	}
	
	

function execute($sql)
{
$rs=mysql_query($sql) or die($this->showError(mysql_error(),$sql));
if(mysql_affected_rows()>0)
			{return true;
			}
			else
			{
			return false;
			}
			}
				
function showError($error,$sql)
	{
		$errHTML = "
			<table class='tblError'>
				<tr class='trErrHeader'>
					<td><b>ERROR:</b>$error</td>
				</tr>
				<tr class='trErrNormal'>
					<td><b>SQL:</b> $sql</td>
				</tr>
			</table>";
			
			echo $errHTML;
	}
	}
	

	
?>