<?php require_once 'include/Connection.php';?>
<?php 
    $templates = new Connection();
    $templates ->InsertQuery
  //  echo 
    ("
    						DELETE FROM ".TEMPLATE_TBL." 
    						" ."
    						WHERE id = ".$_POST["id"]."
    				   ");		
	echo "The Template has been Removed Successfully ..."	;				   	   
   ?>
<?php //echo $templates->Results[0]["template"] ?>