<?php require_once 'include/Connection.php';?>
<?php
	$Servants = new Connection();
	$Servants->Query ("SELECT * FROM ".ServantsTable. " , ". PersonsTable ." WHERE ".ServantsTable.".Memberid = ".PersonsTable.".id AND meetingId = 2");
	foreach ($Servants->Results as $Servant)
	{
		if($Servant["Phone"]!="")
		echo $Servant["Phone"].",<br/>";
	}
?>