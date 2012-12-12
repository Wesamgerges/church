<?php require_once 'include/Connection.php';?>
<?php
	$FamilyId = $_POST["FamilyId"];
	$currentMeetingId = $_POST["cMeetingId"];
  
    $persons = new Connection();
    $persons->Query ("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND relations.FamilyId = {$FamilyId} ");   
	if(count($persons->Results) === 0)die;
?>
<input type="button"  class="attend" value="attend" onclick="attend(<?php echo $_POST["MemberId"]; ?>);" />
<?php if(count($persons->Results) >1) {?>
	<input type="button"  class="attend" value="Family attend" onclick="attendFamily(<?php echo $_POST["FamilyId"]; ?>);" />
<?php }?>
<br/><br/><br/>
 	  
<div  align="left">
<ul>
<?php
foreach ($persons->Results as $person){
	
	$checkAttendance = new Connection();
	$checkAttendance->Query("SELECT * FROM ".AttendanceTable." WHERE MemberId = ".$person["MemberId"].
							" AND weeklyMeetingId = ".$currentMeetingId);
?>
	<li class='personAttend <?php if(count($checkAttendance->Results)>0) echo "attended" ?>' id="m<?php echo $person["MemberId"] ?>">
		<?php //if(count($persons->Results) >1) ?>
			<!--	<input type="checkbox" class="checkbox" checked="checked"/> -->
		<?php echo "(". $person["MemberId"].") ".$person["FirstName"]. " " .$person["LastName"] ?>
	</li>
<?php
}
?>
</ul>

</div>
<div align="right">
	
</div>  
<br>