<?php require_once 'include/Connection.php';?>
<?php
$MemberId = $_POST["MemberId"];
$sizeOfTheBox = 5;
    $persons = new Connection();
    $persons->Query("SELECT * FROM person,relations WHERE person.id = relations.MemberId AND person.Id = ".$MemberId.";");   

	if(count($persons->Results) === 0)die("No Results  ") ;
	$FamilyId = $persons->Results[0]["FamilyId"];
?>
		
<br/>

<table width="100%" class="displayInfo" cellpadding="10" >
    <tr>
    	<td></td>
    	<td>
    		No.
    	</td>
        <td >
            First Name
        </td>
        <td >
            Last Name
        </td>
<!--        
        <td >
            DOF:
        </td>
-->    
        <td >
            Phone
        </td>
        <td >
            Email
        </td>
         <td >
            Status
        </td>
        <td></td>
   </tr>
   <tr class='abc'  >
   	 <td><input type="button" value="+" onclick="$('.MoreInfo').toggle();" /></td>
    	<td>
    		<?php echo "(" .$persons->Results[0]["MemberId"] .")"?>
    	</td>
        <td class='fn'>
            <?php echo $persons->Results[0]["FirstName"]?>
        </td>
        <td>
            <?php echo $persons->Results[0]["LastName"]?>
        </td>
<!-- 
        <td>
            <?php echo $person["DOF"]?>
        </td>
-->        
        <td>
            <?php echo $persons->Results[0]["Phone"]?>
        </td>
        <td>
             <?php echo $persons->Results[0]["Email"]?>
        </td>
         <td>
            <?php echo  $persons->Results[0]["Status"]?>
        </td>
        <td><a href="EditFamily2.php?FamilyID=<?php echo $FamilyId ?>" >edit</a></td>
   </tr>


<br>
<?php 
  
    $persons->Query("SELECT * FROM person,relations WHERE person.id = relations.MemberId AND person.Id <> ".$MemberId." AND relations.FamilyId = ". $FamilyId.";");   
	if(count($persons->Results) > 0){
 ?>

    
   <tr class='MoreInfo' style="display: none;">
   	<td></td>
    	<td>
    		<?php echo "(" .$persons->Results[0]["MemberId"] .")"?>
    	</td>
        <td class='fn'>
            <?php echo $persons->Results[0]["FirstName"]?>
        </td>
        <td>
            <?php echo $persons->Results[0]["LastName"]?>
        </td>
<!-- 
        <td>
            <?php echo $person["DOF"]?>
        </td>
-->        
        <td>
            <?php echo $persons->Results[0]["Phone"]?>
        </td>
        <td>
             <?php echo $persons->Results[0]["Email"]?>
        </td>
         <td>
            <?php echo  $persons->Results[0]["Status"]?>
        </td>
        <td><a href="EditFamily2.php?FamilyID=<?php echo $FamilyId ?>" >edit</a></td>
   </tr>
<?php }?>
</table>

<br>
