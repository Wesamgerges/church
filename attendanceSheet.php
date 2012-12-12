<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<head>
	<title> Attendance Sheet </title>
	<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />

	<style type="text/css">
	.element	{ position:fixed; top:0; left:0; padding:10px; font-family:Arial; background:#EEE;z-index: 2;  }
	</style>
	</head>
	<body>
		<?php include("include/Connection.php");?>
<?php
	$getAllWeeklyMeetings = new Connection();
	$getAllWeeklyMeetings -> Query ( " SELECT * FROM weeklymeeting WHERE meetingid = 2 AND id>52 order by id " );
?>
<table class="element attendanceTable">
	<tr>
		<td class= 'attendanceCell' width='160px' align='center'>
			Name
		</td>
		<?php
		for ( $j = 0 ; $j < count( $getAllWeeklyMeetings -> Results ) ; $j++ )
		{
			$d = new DateTime( $getAllWeeklyMeetings -> Results[$j]["Date"]);
			?>
			<td  width='85px' class= 'attendanceCell' align='center'>
				<?php echo $d->format('M d Y'); ?>
			</td>
		<?php
		}
		?>
	</tr>
</table>
	<?php
	$getMembersAttenededMeetings = new Connection();
	$getMembersAttenededMeetings -> Query ( "SELECT * 
													FROM  `meetingattendance` , weeklymeeting, person
												WHERE weeklymeeting.id = meetingattendance.`weeklyMeetingId` 
												AND meetingid = 2
												AND person.id = memberId AND weeklymeeting.id >52
												ORDER BY MF, FirstName, person.id,weeklymeeting.id" );	
?>
<br/><br/><br/>
<table class=" attendanceTable" style="position:absolute; top:10; left:0; ">
	<?php
	for( $i = 0 ; $i < count ( $getMembersAttenededMeetings -> Results ) ; )
	{
	?>
	<tr>
		<td class= 'attendanceCell' width='150px'>
			<?php echo $getMembersAttenededMeetings -> Results [$i]['FirstName']
		. " ". $getMembersAttenededMeetings -> Results [$i]['LastName']; ?>
<br/><sub><?php echo $getMembersAttenededMeetings -> Results [$i]['Phone']
		?></sub>
		</td>
		<?php
		$currentMember = $getMembersAttenededMeetings -> Results [$i]["MemberId"];
		for ( $j = 0 ; $j < count( $getAllWeeklyMeetings -> Results ) ; $j++ )
		{
			
		?>
		<td align='center' class= 'attendanceCell'  width='85px'>
		<?php
		if($getMembersAttenededMeetings -> Results [$i]['weeklyMeetingId'] == $getAllWeeklyMeetings-> Results[$j]["Id"] 
					&& 	$currentMember  == $getMembersAttenededMeetings -> Results [$i]["MemberId"] 
		)
			{
				
			?>
		<img src='images/120px-Icon-checked.png' width=40 height=40/>
		<?php 
			$i++;
			}  ?>
		</td>
	<?php
		
	} ?>
	</tr>

	<?php
	} ?>
	</table>
		<br/>
		
		<br/>
		<br/>
		<br/>
		<br/>
			<br/>
		
		<br/>
		<br/>
		<br/>
		<br/>
	</body>
</html>
		