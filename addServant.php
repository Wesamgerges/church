<?php require_once 'include/Connection.php';?>
<?php
	$Save = new Connection();
	$Save->Query("SELECT * FROM ".ServantsTable." WHERE meetingId = ".$_POST["MeetingId"]. " AND memberid = ".$_POST["Memberid"]);
	/*
	echo "done";
		print_r($Save->Results);
		*/
	
	if(count($Save->Results)>0)return;
	echo $Save->InsertQuery
	     ("INSERT INTO ".ServantsTable." (meetingId,memberid)
	                            VALUES(".$_POST["MeetingId"].",".$_POST["Memberid"].");");
?>