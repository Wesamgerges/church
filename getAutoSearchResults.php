<?php require_once 'include/Connection.php';?>
<?php
$searchword = $_POST["searchWord"];
    $persons = new Connection();
    $persons->Query("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND (firstname like '{$searchword}%' )");   
	if(count($persons->Results) === 0)die;
?>
<table border=1>
    <tr>
        <td >
            FirstName:
        </td>
        <td >
            LastName:
        </td>
        <td >
            DOF:
        </td>
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
        <td class='fn'>
            <?php echo $person["FirstName"]?>
        </td>
        <td>
            <?php echo $person["LastName"]?>
        </td>
        <td>
            <?php echo $person["DOF"]?>
        </td>
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