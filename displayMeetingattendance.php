<?php $currentMeetingId=13;//$_POST["currentMeetingId"];?>
<?php require_once 'include/Connection.php';?>

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
<?php 
	$getMeetinginfo = new Connection();
	$getMeetinginfo->Query("SELECT *,weeklymeeting.Id AS weeklymeetingId FROM weeklymeeting,meetings WHERE meetings.Id = weeklymeeting.MeetingId AND MeetingId=".$_POST["MeetingId"]." AND Date='".$_POST["Date"]."'");
	
	if(count($getMeetinginfo->Results)>0) 
		$currentMeetingId = $getMeetinginfo->Results[0]["weeklymeetingId"];
	else
		die("there is no meeting at ".$_POST["Date"]);
	
	$getAttendance = new Connection();
	$getAttendance->Query("SELECT * FROM meetingmembers,person WHERE meetingmembers.MemberId = person.Id AND weeklyMeetingId = {$currentMeetingId}");
?>
<div class="personAttend"> <?php echo $getMeetinginfo->Results[0]["Mname"]?></div>
<table border="1" >
<?php 
	foreach ($getAttendance->Results as $attendant ) {		
?>	
  		<tr>
  			<td class="personAttend">
  				<?php echo $attendant["FirstName"]." ".$attendant["LastName"]?>
			</td>
		</tr>
<?php }?>		
	</table>
</body>
</html>