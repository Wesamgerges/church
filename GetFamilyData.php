<?php require_once 'include/Connection.php';?>
<?php

   $Family = new Connection();
   $Family->Query("SELECT * FROM family WHERE ID = ".$_POST["FamilyID"]);   

   $persons = new Connection();
   $persons->Query("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND relations.FamilyID = ".$_POST["FamilyID"]." ORDER BY relations.MemberShipType DESC");   
?>
<table border=5 style="color=black">
<tr>
        <td >
            <strong>House No.</strong>
        </td>
        <td >
            <strong>Floor No.</strong>
        </td>
        <td >
           <strong> Street</strong>
        </td>
        <td >
           <strong> City</strong>
        </td>
        <td >
            <strong>State</strong>
        </td>
         <td >
           <strong> ZIP</strong>
        </td>
   </tr>


    <tr>
        <td >
            <?php echo $Family->Results[0]["HouseNo"]?>
        </td>
        <td >
            <?php echo $Family->Results[0]["Floor"]?>
        </td>
        <td >
            <?php echo $Family->Results[0]["Street"]?>
        </td>
        <td >
            <?php echo $Family->Results[0]["City"]?>
        </td>
        <td >
            <?php echo $Family->Results[0]["State"]?>
        </td>
         <td >
            <?php echo $Family->Results[0]["ZIP"]?>
        </td>
   </tr>
<tr >
        <td>
            <strong>FirstName</strong>
        </td>
        <td>
           <strong> LastName</strong>
        </td>
        <td>
           <strong> DOF</strong>
        </td>
        <td>
           <strong> Phone</strong>
        </td>
        <td>
           <strong> Email</strong>
        </td>
         <td>
           <strong> Status</strong>
        </td>
   </tr>
<?php

foreach ($persons->Results as $person)
{
?>
    <tr class='abc' id='<?php echo $person["ID"]?>' >
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
            <?php if( $person["Phone"]=="") echo ".";
             echo $person["Phone"]?>
        </td>
        <td>
             <?php if( $person["Email"]=="") echo ".";
             echo $person["Email"]?>
        </td>
         <td>
            <?php echo  $person["Status"]?>
        </td>
   </tr>

<?php
}
?>
</table>
<a href="EditFamily2.php?FamilyID=<?php echo $_POST["FamilyID"]?>">Edit</a><br/>

