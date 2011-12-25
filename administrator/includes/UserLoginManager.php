<?php
require_once('projectConstant.php');

class UsersLogin
{


    private $id=0;
    private $res=0;
	private $status=0;

    public  static function Authenticate($username,$pass){
        try
        {
            $dbh = new PDO(DB_DSN, DB_LOGIN, DB_PASSWORD);

        }
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        $username=$username;
        $pass=md5(($pass));
        $stmt=$dbh->prepare("CALL ".SP_USER_LOGIN."(?,?)");
        $stmt->bindParam(1,$username);
        $stmt->bindParam(2,$pass);
        $stmt->execute();
        $row=$stmt->fetch();
        $loginInfo=new UsersLogin();
        $loginInfo->id=$row['id1'];
   
        $dbh=null;
        return $loginInfo;


    }

  
    function getID(){
        return $this->id;
    }

}


