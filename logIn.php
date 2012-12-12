<?php
    session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="include/components.css" title="default">
<title>Log In</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

</head>
  <body>
  	
  	<div id="WelcomeMessage" >
  		<a href="javascript:Starting();" id="loginlink">login</a>	
  	</div>
  	
  	<?php  include("include/FormLibrary.html"); ?>
</body>
</html>