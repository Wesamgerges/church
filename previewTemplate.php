<?php require_once 'include/Connection.php';?>
<?php 
    $templates = new Connection();
    $templates ->Query("
    						SELECT * FROM ".TEMPLATE_TBL." 
    						" ."
    						WHERE id = ".$_GET["id"]."
    				   ");			   
   ?>
<?php echo "<!--".$templates->Results[0]["subject"]."!@;-->". $templates->Results[0]["template"] ?>
<?php
/*
</body>
</html>

<html>
<head>
	<title> <?php echo "\"".$templates->Results[0]["name"]."\"" ?>  Template Preview </title>
	</head>
<body>
 * */

	?>