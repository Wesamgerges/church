<?php require_once 'include/Connection.php';?>
<?php
$searchword = $_POST["search"];
    $persons = new Connection();
    $persons->Query("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND (firstname like '%{$searchword}%' or lastname like '%{$searchword}%')");   

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
<h3> Click to view details</h3>
<br/>
<div id="Searchmessage"></div>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript">
 
$("document").ready(function(){         
    $(".abc").click(function()
    {
         $.post('GetFamilyData.php', {FamilyID:$(this).attr("id")},  
          function(data) {              
          $('#Searchmessage').html(data).hide().slideDown(500);            
           });       

    })
});
    
</script>
