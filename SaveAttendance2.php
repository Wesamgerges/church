<?php require_once 'include/Connection.php';?>
<?php
$weeklyId = $_POST["weeklyId"] ;
$SaveAttendnance = new Connection();
//foreach ($_POST["ids"] as $id) 
$id = $_POST["id"] ;
{
		
	$SaveAttendnance -> Query 
	 (" SELECT id FROM meetingattendance WHERE memberid = {$id} AND weeklyMeetingId = {$weeklyId}");
	 if(count($SaveAttendnance ->Results)>=1) 
	 {
	 	// Delete:
	 	$SaveAttendnance -> InsertQuery
	 	 ( "Delete FROM meetingattendance
											WHERE memberid = {$id} AND weeklyMeetingId = {$weeklyId};
										");
	 }
	 else{	 		 	
			$SaveAttendnance -> InsertQuery( "INSERT INTO meetingattendance(memberid,weeklyMeetingId)
										VALUES({$id},{$weeklyId});		
		");
	 }
}
    
   
?>