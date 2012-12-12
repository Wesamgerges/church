<?php
 /*
  * Created:
  * BY: Wesam Gerges
  * 
  * Add Weekly Meeting Page.
  * Add Weekly Meeting like youth Meeting, April 29, 2012
  * 
  * Updates or inserts a new weekly meeting to the DB
  * 
  * Post Variables:
  * 	Meetings
  * 	Date
  * 
  */
?>
<?php require_once 'include/Connection.php';?>
<?php 

		$Save = new Connection();
		$Save->Query("SELECT * FROM weeklymeeting WHERE MeetingId=".$_POST["Meetings"]." AND Date='".$_POST["Date"]."'");
	    
	    if(count($Save->Results)>0) $meetingId = $Save->Results[0]["Id"];
		else {
	    	$meetingId = $Save->InsertQuery
	   							("INSERT INTO weeklymeeting (MeetingId,Date)
	                            VALUES(".$_POST["Meetings"].",'".$_POST["Date"]."')");
		}
	echo $meetingId;
?>	                            