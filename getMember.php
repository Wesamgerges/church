<?php require_once 'include/Connection.php';?>
<?php
$MemberId = $_POST["id"];

    $persons = new Connection();
    $persons->Query("SELECT * FROM person WHERE id = ".$MemberId); 
?>	
  		<table width="100%" >
   			<tr>
	   			<td>
	   				<img src='images/cross-icon.png' width='50'height='50' align="middle" />
	   			</td>
   				<td class="listMember">   					
   					<?php echo $persons->Results[0]["FirstName"] ." ".$persons->Results[0]["LastName"]?>      					
   				</td>
   			</tr>
   			<tr>
   				<td>
   					<?php echo $persons->Results[0]["Email"] ." ".$persons->Results[0]["Phone"]?> 
   				</td>
   			</tr>
   		</table>
 