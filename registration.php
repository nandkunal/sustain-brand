<?php
require_once("administrator/includes/ADAO.php");

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=md5($_POST['password']);
$username=$_POST['username'];
$res=ADAO::createAccount($fname,$lname,$email,$pass,$username);
if($res==1){
	?>
    <script type="text/javascript">
	alert("Congratulations,Your Account has been created");
	window.location.href="index.php";
	</script>


<?php } else {?>
<script type="text/javascript">
	alert("Error,Username Already in use");
	window.location.href="index.php";
	</script>
    
    <?php }?>