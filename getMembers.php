<?php require_once 'include/Connection.php';?>
<?php
$searchword = $_POST["searchWord"];
$sizeOfTheBox = 5;
    $persons = new Connection();
    $persons->Query("SELECT * FROM person WHERE (firstname like '{$searchword}%' ) ORDER BY firstname");   
	if(count($persons->Results) === 0)die;
	if(count($persons->Results)<5 ) $sizeOfTheBox = count($persons->Results);
	if(count($persons->Results)== 1) $sizeOfTheBox = 2;

 foreach ($persons->Results as $person)
	{
?>    	   	
   		<table width="100%" class="listMember" id="<?php echo $person["ID"]?>" ondblclick="addServant($(this).attr('id'));">
   			<tr>
   				<td>
   					<img src='images/cross-icon.png' width='50'height='50' align="middle" />
   					<?php echo $person["FirstName"] ." ".$person["LastName"]?>   
   					
   				</td>
   				<td align="right">
   					<a href="#" onclick="Open(<?php echo $person["ID"]?>);" > 
					<div class="showInfo"> show Info</div></a>   					
   				</td>
   			</tr>
   		</table>
<?php
}
?> 
