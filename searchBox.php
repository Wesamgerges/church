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
  	<table align="center" border="0" >
  		<tr>
  			<td height="200px" valign="top">
  			<div align="center" id="container">
    		  <form  method="post" name="info" id="info" >
	    		<h1 align="center">Search</h1>	    

	            <input id="searchWord" name="searchWord" autocomplete="off"/>
	    		<div id="message">
	    		
    			</div>
   			</form>
  		</div> 
  				
  		</td>
  		</tr>
  		 <tr>
  			<td height="200px">
  			 <div id="detailedMessage" align="center" ></div>
		     <div id="detailedMessage2" align="center"></div>
  			</td>
  		</tr>

  	</table>
  	 
   <script>
  var ss=1;
  var searchResultCount = 0; 
  var lastWord="";
  $("document").ready(function(){
$("#searchWord").click(function(){
	if($("#searchWord").val()!="")
	{
		$('#message').show();
	}
		});  	

$("#searchWord").focus(function(){
	if($("#searchWord").val()!="")
	{
		$('#message').show();
	}
});

  	$("#searchWord").keydown(function(e){
  		
  	switch(e.keyCode) { 
         // User pressed "up" arrow
         case 38:
         	if(--ss<1)ss=$("li").size() ;

            $("li").removeClass("highLight");
            $("#"+ss).addClass("highLight");
            event.preventDefault();
          
         break;
         // User pressed "down" arrow
         case 40:
         if($("#message").is(":hidden") == true){
         	$('#message').show();
         }
         if(++ss>$("li").size()){
         	ss=1;
         }
         $("li").removeClass("highLight");
         $("#"+ss).addClass("highLight");
         
          event.preventDefault();
         break;
         // User pressed "enter"
         case 13:
         	getSelectedItem($("#"+ss).val());
         	//$('#message').hide();
         
            event.preventDefault();
         break;
      }
    });
    
  	$("#searchWord").keyup(function(e){
  	  if(e.keyCode==13 || e.keyCode==38 || e.keyCode==40)return;
	  if($("#searchWord").val()==""){
  		$('#message').hide();
  		return;
  	}		
  	 if($("#message").is(":hidden") == true){
         	$('#message').show();
         }
  		$.post('getgsResults.php', $("#info").serialize(),  
                function(data) { 
                $('#message').html(data);   
               $("#"+ss).addClass("highLight");                   
         });       
  	});

  });
  
 /* function  getSelectedItem(f) {
  	$("#searchWord").val($("#"+ss).text());
  	$('#message').hide();
   $.post('getResultsByFId.php', {FamilyId:f},  
	    function(data) { 	        
	    $('#detailedMessage').html(data).hide().fadeIn(500); 	         
	     }); 
  }
  */
 function getSelectedItem(m,f) {
  	$("#searchWord").val($("#"+ss).text());
  	$('#message').hide();
  	
    $.post('getResultsByFId.php', {MemberId:m,FamilyId:f},  
	    function(data) { 	        
	    	$('#detailedMessage').html(data).hide().fadeIn(500); 	         
	    }); 
  }
    	
   	function setSelectItem(s)
   	{
   		ss=parseInt(s);
   		
   		$("#detailedMessage2").html(s);
   		$("li").removeClass("highLight");
   		$("#"+s).addClass("highLight");
   		
   	}
  </script>
 </body>
</html>

