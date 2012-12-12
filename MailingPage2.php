<?php require_once 'include/Connection.php';?>
<?php
    $AttendedPersons = new Connection();
    $AttendedPersons ->Query//("SELECT * FROM person,meetingattendance WHERE person.id=meetingattendance.MemberId AND meetingattendance.weeklyMeetingId = 37 ORDER BY FirstName");
    
    ("SELECT * FROM membermeeting, person WHERE  membermeeting.meetingId = 2 AND  
							person.id=memberid  AND memberid  
							NOT IN (
									SELECT memberid FROM meetingattendance WHERE  
									meetingattendance.weeklyMeetingId = 37
									)
							ORDER BY FirstName;
							");    
	 
	 
	//print_r($AttendedPersons -> Results);
?>
<HTML>
	<HEAD>
		<style>
			td {	
					font-family: Arial, Helvetica, sans-serif;
					font-size: 16px;
					
				}	
			.tabledata {color: #777;}
			.highlighttabledata{ 
				font-weight: bold;
				color: #000;
				 }

		</style>
<link href="include/stylesheet1.css" media="all" rel="stylesheet" type="text/css" />
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>	

</HEAD>
	<body>

<div>
	<form>
<table cellspacing="10px" align="center" width="950px">
	<tr>
<?php 
	$addRow = 0;
	foreach($AttendedPersons -> Results as $attendee){
		if($addRow++ % 5 == 0){
?>
	</tr>
	<tr>
 	<?php }?>
	  <td ="td<?php echo $attendee["ID"] ?>" width="20%">
	  	<label for="m<?php echo $attendee["ID"] ?>" class="tabledata" id="l<?php echo $attendee["ID"] ?>">
		<input type="checkbox" id="m<?php echo $attendee["ID"] ?>"  class="tabledata" name="m<?php echo $attendee[0] ?>" checked=checked />
		<?php echo $attendee["FirstName"]. " " .$attendee["LastName"]; ?> 
	 	</label>
	  </td>
	  <td></td>
<?php
	}
?>
<script>
$(".tabledata").toggleClass("highlighttabledata");
// Highlight Table row on check checkbox
$('.tabledata').change(function(){
    var id = $(this).attr('id');
    var rowId = "#"+id.replace("m", "td");
    $(rowId).toggleClass("highlighttabledata");
});

</script>

</tr>
</table>
</form>
</div>
</body>
</HTML>