<?php require_once 'include/Connection.php';?>
<?php
	$Servants = new Connection();
	$Servants->Query ("SELECT * FROM ".ServantsTable. " , ". PersonsTable ." WHERE ".ServantsTable.".Memberid = ".PersonsTable.".id AND meetingId = ".$_POST['MeetingId']);
	foreach ($Servants->Results as $Servant)
	{
?>
   		<table width="100%" class="listMember servant" id="<?php echo $Servant["ID"]?>">
   			<tr>
   				<td>
   					<img src='images/cross-icon.png' width='50'height='50'align="middle" />
   					<?php echo $Servant["FirstName"] ." ".$Servant["LastName"]?>   
   					
   				</td>
   				<td align="right">   					
					<div class="showInfo" onclick="removeMember(<?php echo $Servant["ID"].",'".  $Servant["FirstName"] ."', '".$Servant["LastName"]."'"?>)">
						 <img src='images/X.png' width='25'height='25'align="middle" /> </div>				
					<div class="showInfo" onclick="Open(<?php echo $Servant["ID"]?>);" > 
						<img src='images/info.png' width='25'height='30'align="middle" /> </div>  					
   				</td>
   			</tr>
   		</table>
  
<?php
 
 
}
?> 
