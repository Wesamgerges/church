<?php require_once 'include/Connection.php';?>
<?php 
	//print_r($_POST);
	$name = $_POST["name"];
	$subject = $_POST["subject"];
	if (get_magic_quotes_gpc())
		$template = ($_POST["template"]);
	else
		$template = addslashes($_POST["template"]);
	
	$templates = new Connection();
	if(isset($_POST["id"])){
		   $sqlid = $templates -> InsertQuery 
    //echo 
    				  ( "
    						UPDATE ".TEMPLATE_TBL." SET name = '{$name}' , subject = '{$subject}', template = '{$template}'
    						WHERE id =".$_POST["id"]
					   );
	echo "Template '" .$name."' Saved Successfully...";					   
		
	}
		else{
		    $sqlid = $templates -> InsertQuery 
		    //echo 
		    				( "
	    						INSERT INTO ".TEMPLATE_TBL." (name,subject,template)
	    						VALUES ('{$name}','{$subject}','{$template}');
						   ");
		if($sqlid > 0)
				echo "Template saved as '" .$name."'";
			else {
				echo "failed to save your template";
			}
						   
	}			
				   
	
   ?>
		   