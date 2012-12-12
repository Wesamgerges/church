<?php 
session_start();
include("include/Connection.php");
	/* $CheckUser = new Connection();
        $CheckUser ->InsertQuery("INSERT INTO users (username,hashedpassword ,firstname,lastname) 
        				VALUES('".$_POST["UserName"]."','".sha1($_POST["Password"])."','admin','admin');");
*/
    if(isset($_POST["UserName"]) && isset($_POST["Password"]))
    {
        $CheckUser = new Connection();
        $CheckUser ->Query("Select id,username,firstname,lastname From users WHERE username='".$_POST["UserName"]."' AND hashedpassword='".sha1($_POST["Password"])."';");
        if(isset($CheckUser ->Results[0][0]))
        {
            $_SESSION["user_id"]=$CheckUser ->Results[0]['id'];
            $_SESSION["user_name"]=$CheckUser ->Results[0]['username'];
            
            echo "<div class='TopMessage success'>Welcome ".$CheckUser ->Results[0]['firstname'] ."</div>";
        }
        else 
            echo "<div class='TopMessage error'> invalid user name or passsword</div>";
    }
  
?>