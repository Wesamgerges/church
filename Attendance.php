<?php
 /*
  * Created:
  * BY: Wesam Gerges
  * 
  * Attendance Page.
  * Take attendace for meetings like youth Meeting, Sunday School
  * 
  * 
  */
?>

<?php
	// Check the user is already loged in or not
	// if the user didn't log in then refer to the login page. 
?>
<?php require_once("include/session.php"); ?>
<?php 
	if (!logged_in()) {
		redirect_to("logIn.php");
	}
?>
<?php
	// Get the Current Meeting Id to be used in the attendance
	// this Id is sent from the Setweeklymeeting page
?>
<?php $currentMeetingId=$_GET["currentMeetingId"];?>
<?php require_once 'include/Connection.php';?>
<?php
	//Start of HTML Contents
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title> Attendance </title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
</head>
  <body>
  	<a href="<?php echo MainPage; ?>" >Home</a>
  	<table height="550px" align="center" border="0" >
  		<tr>
  			<td valign="top">
  				<div id="currentMeeting" class="meeting">
    			<?php 
    				$getMeetingInfo = new Connection();
					$getMeetingInfo->Query("SELECT * FROM meetings,weeklymeeting where meetings.id=weeklymeeting.MeetingId AND weeklymeeting.id={$currentMeetingId};");
					$d = new DateTime($getMeetingInfo->Results[0]["Date"]);
					echo $getMeetingInfo->Results[0]["Mname"]."<br/>(". date("M d, Y", strtotime($getMeetingInfo->Results[0]["Date"])).")";
    			?>	
    			<input type="hidden" id="MeetingId" name="MeetingId" value="<?php echo $getMeetingInfo->Results[0]["MeetingId"]?>" />
    			</div>
  			</td>
  		</tr>
  		<tr>
  			<td height="200px" valign="top" id="all">
  			<div align="center" id="container">
    		  <form  method="post" name="info" id="info" onsubmit="return false;">
    		  		    	   
	            <input id="searchWord" name="searchWord" autocomplete="off"/>
	    		<div id="message" class='outterSearchResult'>
	    		
    			</div>    			
   			</form>
  		</div> 
  				
  		</td>
  		</tr>
  		 
		<tr>
			<td height="350px" valign="top">
		   		 <div id="detailedMessage" align="center"></div>
			</td>
		</tr>
  	 </table>
	 <footer>
	  	<a href="displayAttendance.php?currentMeetingId=<?php echo $currentMeetingId.'&MeetingId='.$getMeetingInfo->Results[0]["MeetingId"]; ?>"> display Attendance </a>
	 </footer>
	 
	 <script> var currentMeetingId = <?php echo $currentMeetingId ?></script>
	 <script src="include/searchBox.js"></script>
	 <script src="include/attend.js"></script>	
	 
 </body>
</html>

