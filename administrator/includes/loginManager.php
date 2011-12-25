<?php
require_once('projectConstant.php');
require_once('DBUtil.php');
class LoginInfo 
{


    private $id=0;
    private $msg=NULL;

    public  static function Authenticate($username,$pass){
        $o=new DBUtil();
        $username=mysql_real_escape_string($username);
       $pass=md5(mysql_real_escape_string($pass));
        $query="CALL ".SP_LOGIN."('".$username."','".$pass."')";
        $res=$o->fetch($query);
        $row=mysql_fetch_array($res);
        
        $loginInfo=new LoginInfo();
        $loginInfo->msg=$row['res_msg'];
         $loginInfo->id=$row['id1'];
         return $loginInfo;


     }
     
     function getMsg(){
     return $this->msg;

     }
     function getID(){
     return $this->id;
     }

}


