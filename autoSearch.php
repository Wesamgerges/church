<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title>Search</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
</head>
  <body>
    <form  method="post" name="info" id="info" >
    <h1 align="center">Search</h1>
    
    <input id="searchWord" name="searchWord" />
  </form>
  <div id="message"></div>
  <script>
  $("document").ready(function(){
  	$("#searchWord").keyup(function(){//alert($("#searchWord").val());
  	if($("#searchWord").val()==""){
  		$('#message').html("");
  		return;
  	}
  		$.post('getAutoSearchResults.php', $("#info").serialize(),  
                function(data) { 
                    //alert(data);
                $('#message').html(data).hide().fadeIn(500); 
                     
                 }); 
  	});
  });
  </script>
 </body>
</html>