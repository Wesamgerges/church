<?php
 /*
  * Created:
  * BY: Wesam Gerges
  * 
  * Set Weekly Meeting Page.
  * Set Weekly Meeting like youth Meeting, April 29, 2012
  * 
  * 
  */
?>

<?php require_once("include/session.php"); ?>
<?php 
	if (!logged_in()) {
		redirect_to("logIn.php");
	}
?>
<?php require_once 'include/functions.php';?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=encoding">
	<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<title> Set Weekly Meeting </title>
	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">		</script>
	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js">	</script>
</head>
  <body>

<script>
	$(function() {
		$( "#datepicker" ).datepicker({showWeek: true,
			firstDay: 1, altField: "#alternate",
			altFormat: "yy-mm-dd"});
	});
	
	function setWeeklyMeeting(f){
		$.post('addWeeklyMeeting.php', $("#info").serialize(),  
	    function(data) {
	    	$("#currentMeetingId").val(data);	    	
	    	f();	         
	    });
	  }
	  
	$("document").ready(function(){
	  $("#setWeekly").click(function(){		  	
 			setWeeklyMeeting(function(){
	    	$("#info").submit();     
	    });   	    	
	  });
	  
	  $("#setWeekly2").click(function(){		  	
 			setWeeklyMeeting(function(){	
 			$('#info').attr('target', '_self');
			$('#info').attr('action', 'EasyAttendance2.php');
	    	$("#info").submit();
    	});        	    	
	  });
	});
	
	</script>
	<form id="info" name="info" action="Attendance.php" method="get">
		<table align="center" cellpadding="15px">
			<tr>
				<td>
					<?php echo getAllMeetings(); ?>
				</td>
			</tr>			
			<tr>
				<td>
				<!------------ Date Picker ----------------->
					<div id="datepicker">	
					</div>
				</td>
			</tr>	
			<tr>
				<td>
					<table>
						<tr>
							<td>
								<input type="text" id="alternate" size="30" name="Date"/>
							</td>
							<td>
								<input type="button" id="setWeekly" value=" Take Attenance " style="margin-bottom:5px;font-family:verdana;"/>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type="button" id="setWeekly2" value=" Use Fast Attenance " style="margin-bottom:5px;font-family:verdana;"/>
							</td>
							
						</tr>
					</table>
				</td>
			</tr>		
	  </table>
	  <input type="hidden" id="currentMeetingId" name="currentMeetingId" value="" />
	</form>
</body>
</html>

