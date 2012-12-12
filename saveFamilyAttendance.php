<?php require_once 'include/functions.php';?>
<?php 
	$Family = new Connection();
	$Family->Query("SELECT * FROM family,relations WHERE family.Id=relations.familyId AND family.Id=".$_POST["FamilyId"]);
	$Save = new Connection();
	foreach($Family->Results as $member){
		saveMemberAttendance($_POST["weeklyMeetingId"],$member["MemberId"],$_POST["MeetingId"]);
	}
?>
