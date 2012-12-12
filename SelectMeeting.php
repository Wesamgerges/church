<?php require_once 'include/Connection.php';?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title>set weekly meeting</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
</head>
  <body>

<script>
	$(function() {
		$( "#datepicker" ).datepicker({showWeek: true,
			firstDay: 1, altField: "#alternate",
			altFormat: "yy-mm-dd"});
	});
/*	$("document").ready(function(){
	  $("#setWeekly").click(function(){		  	
		$.post('addWeeklyMeeting.php', $("#info").serialize(),  
	    function(data) {//alert(data); 
	    	$("#currentMeetingId").val(data);
	    	alert("your meeting have been set successfully");	
	    	$("#info").submit();        
	    	//$('#detailedMessage').html(data).hide().fadeIn(500); 	         
	    }); 
	  });
	});*/
	</script>
<form id="info" name="info" action="displayMeetingattendance.php" method="post">
<select name="MeetingId">
<?php 
	$meetings = new Connection();
	$meetings->Query("SELECT * FROM meetings");
	foreach($meetings->Results as $meeting)
?>
	<option value="<?php echo $meeting["Id"]?>"><?php echo $meeting["Mname"]?>
	
	</option>
	</select>
	<br/>
	<br/>
	<div class="demo">
	
	<div id="datepicker"></div>
	<br/>
		<input type="text" id="alternate" size="30" name="Date"/>
		<input type="submit" id="setWeekly" value=" Get Meeting Attendance "/>
		<input type="hidden" id="currentMeetingId" name="currentMeetingId" />
	</div>
	</form>
</body>
</html>