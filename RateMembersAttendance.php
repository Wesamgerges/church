<?php require_once 'include/functions.php';?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<title>Show Rating </title>
</head>
 
 
<body>
  	<h1 align="center"> Rating </h1>
  	<div align="center">
  	<table>
  		<tr>
  			<td align="center">
  				<?php getAllMeetings();?>
  			</td>
   		</tr>
  	</table>
  	<br/>
  	</div>	
   	<div id = "rates"></div>
  	<script language="JavaScript">

  		var orderby = "FirstName";
  		var order = "ASC";  		
  		var orders = ["FirstName","rating"];
  		
  		function getData(){
 			$.post("MembersRating.php",{meetingid:$("#Meetings").val(),orderby:orderby, order:order},function(data){
  				$("#rates").html(data);
  			});
  		}
  		
  		function changeOrder(theOrder){  			
  			if( orders[theOrder] == orderby ) toggleOrder();
  			else order = "ASC";
  			orderby = orders[theOrder];  			  			
  			getData();
  		}
  		
  		function toggleOrder(){
  			order = (order == "ASC")? "DESC" : "ASC"; 
  		}
  		
  		$("document").ready(function(){
  			getData();  			   		
  		});
  	</script>
</body>
</html>