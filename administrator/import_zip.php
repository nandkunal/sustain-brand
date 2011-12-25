<?php
$host="localhost";
$dbname="sustain_brand";
$con=mysql_connect($host,'root','');
$db=mysql_select_db($dbname,$con);
if($db){
	//echo "Connection Tested";
}
mysql_query("truncate t_sales_list");
$row = 1;//To Determine the Number of rows
//$no_of_extra_cols=2;//No of extra Columns which are in DB but not in Sheet
if (($handle = fopen("CountySalesTaxRateReport.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);//This is used to count of no of Active Cells in a the csv sheet
       // echo "<p> $num fields in line $row: <br /></p>\n";
       $query="INSERT INTO t_sales_list values(";
        for ($c=0; $c < $num-1; $c++) {//$num-1 is used to eliminate last comma
			//$data=mysql_real_escape_string($data[$c]);
			
			$query.="'$data[$c]',";
			 
           // echo $data[$c] . "<br />\n";//Display Data Cells
        }
		$num=$num-1;
		$query.="'$data[$num]'";//To assign last variable
		$query.=")";
		//echo $query;
	   mysql_query($query) or die(mysql_error());
		$data=null;
		$query=null;
		 $row++;
    }
    fclose($handle);
}
?>