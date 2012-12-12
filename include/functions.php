<?php require_once 'include/Connection.php';?>
<?php
 
function saveMemberAttendance($weeklyMeetingId,$memberId,$MeetingId){
	$Save = new Connection();
	$Save->Query("SELECT * FROM ".AttendanceTable." WHERE weeklyMeetingId = {$weeklyMeetingId} AND MemberId = {$memberId}");
	
	//print_r($Save->Results);
	
	if(count($Save->Results)<=0)
	{
	$Save->InsertQuery
	     ("INSERT INTO ".AttendanceTable." (weeklyMeetingId,MemberId)
	                            VALUES(".$weeklyMeetingId.",".$memberId.");");
	}

// CHECK IF THE MEMBER IS ADDED TO THE MEETING LIST OR NOT
// IF THE MEMBER IS NOT ADDED, WE ADD.

	$SaveMemberMeeting = new Connection();
	$SaveMemberMeeting->Query("SELECT * FROM ".MemberMeetingTable." WHERE meetingId = {$MeetingId} AND MemberId = {$memberId}");
	
	//print_r($Save->Results);
	
	if(count($SaveMemberMeeting->Results)>0)return;
	$SaveMemberMeeting->InsertQuery
	     ("INSERT INTO ".MemberMeetingTable." (meetingId,MemberId)
	                            VALUES(".$MeetingId.",".$memberId.");");
}
?>

<?php function creatStatus($id){?>
<select id="Status<?php echo $id?>" name="Status<?php echo $id?>">
<?php
	$getStatus = new Connection();
	$getStatus->Query("SELECT * FROM status");
	foreach ($getStatus->Results as $status){    
?>
	<option value="<?php echo $status["ID"]?>"><?php echo $status["Status"]?> </option>
<?php }?>	
</select>
<?php }?>


<?php function getAllMeetings() {?>
	 	<select name="Meetings" id = "Meetings">
		<?php 
			$meetings = new Connection();
			$meetings->Query("SELECT * FROM meetings ORDER BY Mname");
			foreach($meetings->Results as $meeting){
		?>
			<option value="<?php echo $meeting["Id"]?>"><?php echo $meeting["Mname"]?>			
			</option>
			<?php }?>
		</select>
<?php }?>


<?php?>

<?php
	function getWeeklyMeetings($MeetingId = 2)
	{
 	   $weeklyMeetings = new Connection();
	   $weeklyMeetings -> Query("
		 					SELECT * 
							FROM weeklymeeting
							WHERE meetingid = {$MeetingId}
							ORDER BY DATE DESC
						");
 	?>
 		<select size="5" style="width : 150px" name="weeklymeeting" id = "weeklymeeting">
 			<?php
 			foreach ($weeklyMeetings->Results as $meeting)
			{
 			?>
 				<option value = "<?php echo $meeting["Id"]?>" ><?php echo $meeting["Date"] ?></option>
 			<?php 
 			}?>
 		</select>
	 	<?php
	 	}
	 	?>