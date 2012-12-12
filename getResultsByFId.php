<?php require_once 'include/Connection.php';?>
<?php
$FamilyId = $_POST["FamilyId"];
    $persons = new Connection();
    $persons->Query ("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND relations.FamilyId = {$FamilyId} ");   
	if(count($persons->Results) === 0)die;
?>
<table width="100%">
    <tr>
    	<td>
    		No.
    	</td>
        <td >
            FirstName:
        </td>
        <td >
            LastName:
        </td>
<!--        
        <td >
            DOF:
        </td>
-->    
        <td >
            Phone:
        </td>
        <td >
            Email:
        </td>
         <td >
            Status:
        </td>
   </tr>
   <?php

foreach ($persons->Results as $person)
{
?>
    <tr class='abc' id='<?php echo $person["FamilyId"]?>' >
    	<td>
    		<?php echo "(" .$person["MemberId"] .")"?>
    	</td>
        <td class='fn'>
            <?php echo $person["FirstName"]?>
        </td>
        <td>
            <?php echo $person["LastName"]?>
        </td>
<!-- 
        <td>
            <?php echo $person["DOF"]?>
        </td>
-->        
        <td>
            <?php echo $person["Phone"]?>
        </td>
        <td>
             <?php echo $person["Email"]?>
        </td>
         <td>
            <?php echo  $person["Status"]?>
        </td>
   </tr>

<?php
}

?>
   </table>
<br>