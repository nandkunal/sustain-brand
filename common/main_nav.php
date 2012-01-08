<?php
if(!$auth){?>
<li><a href="sign-up.php"><b>Register</b></a></li>
<li><a href="sign-in.php"><b>Sign In</b></a></li>
<?php }?>
<li><a href="#"><b>Search</b><input name="search" type="text" value="Enter name of products" onclick="if(this.value=='Enter name of products'){this.value=''; }" 
    onblur="if(this.value==''){this.value='Enter name of products';}" /></a> </li>
  
<li><a href="basket-review.php"><b>Basket</b><img src="images/basket-img.png" alt="basket" /></a></li>