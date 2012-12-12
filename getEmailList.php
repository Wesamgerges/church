<?php require_once 'include/Connection.php';?>
<?php
	$emaillist = new Connection();
	$emaillist ->Query("SELECT Email FROM person");
	//print_r($emaillist->Results);
	/*
	foreach($emaillist->Results as $r)
	{
		if($r["Email"]!="")
		echo $r["Email"].",";
	}
	 * 
	 */
?>
<br/>
<br/>
<br/>
<?php
    $persons = new Connection();
    $persons ->Query("SELECT * FROM person,membermeeting WHERE person.id=membermeeting.MemberId AND membermeeting.meetingId = 2 ORDER BY FirstName");   

	foreach($persons->Results as $r)
	{
		if($r["Email"]!="")
		echo $r["Email"].",<br/>";
	}
?>