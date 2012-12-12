<?php require_once 'include/Connection.php';?>
<script language="javascript" src="include/jquery-1.5.js"></script>
<?php
   $FamilyID = $_GET["FamilyID"] ;
  
   $Family = new Connection();
   $Family->Query("SELECT * FROM family WHERE ID = ".$FamilyID);   

   $Persons = new Connection();
   $Persons ->Query("SELECT * FROM person,Relations WHERE person.id=Relations.MemberId AND Relations.FamilyID = ".$FamilyID." ORDER BY Relations.MemberShipType");    
?>

<form action="SaveFamily.php" method="post" name="info" id="info" >
Address:<br>
House No.: <input Id="HouseNo" name="HouseNo" value="<?php echo $Family->Results[0]["HouseNo"]?>" size="5"/>
Floor No.: <input Id="Floor" name="Floor" value="<?php echo $Family->Results[0]["Floor"]?>" size="5"/>
Street: <input Id="Street" name="Street" value="<?php echo $Family->Results[0]["Street"]?>" />
City: <input Id="City" name="City" value="<?php echo $Family->Results[0]["City"]?>" />
State: <input Id="State" name="State" value="<?php echo $Family->Results[0]["State"]?>" size="5"/>
ZIP: <input Id="ZIP" name="ZIP" value="<?php echo $Family->Results[0]["ZIP"]?>" size="5"/><br><br>
<input type="hidden" id="FamilyID" name="FamilyID" value="<?php echo $Family->Results[0]["ID"]?>">
<div id="persons">
<?php
    $i = 0;
    foreach($Persons->Results as $person) {?>    
<div id="person1">
    FirstName: <input id="FirstName<?php echo $i ?>" name="FirstName<?php echo $i ?>" value="<?php echo $person["FirstName"]?>" >
    LastName: <input id="LastName<?php echo $i ?>" name="LastName<?php echo $i ?>" value="<?php echo $person["LastName"]?>"><br><br>
    DOF: <input id="DOF<?php echo $i ?>" name="DOF<?php echo $i ?>" value="<?php echo $person["DOF"]?>">
    Phone: <input id="Phone<?php echo $i ?>" name="Phone<?php echo $i ?>" value="<?php echo $person["Phone"]?>">
    Email: <input id="Email<?php echo $i ?>" name="Email<?php echo $i ?>" value="<?php echo $person["Email"]?>">    
    Status: <input id="Status<?php echo $i ?>" name="Status<?php echo $i ?>" value="<?php echo $person["Status"]?>" size='5'><br><br>
    <input type="hidden" id="person<?php echo $i?>" name="person<?php echo $i++?>" value="<?php echo $person["ID"] ?>">
</div>
<?php }?>    

</div>
<div id="Buttons">
    <input type="hidden" id="NoPersons" name="NoPersons" value="<?php echo --$i ?>">    
    <input type="button" id="Save" name="Save" value=" Save ">
    <input type="button" id="AddOne" name="AddOne" value=" + ">
</div>
<div id="message"></div>
</form>
<script language="javascript" >
function BuildAContact()
{
    $("#NoPersons").val(parseInt($("#NoPersons").val())+1) ;
    return "<div id='person"+$("#NoPersons").val()+"'>"+
    "FirstName: <input id='FirstName"+$("#NoPersons").val()+ "' name='FirstName"+$("#NoPersons").val()+"' value='' >"+
    "LastName: <input id='LastName"+$("#NoPersons").val()+ "' name='LastName"+$("#NoPersons").val()+"' value='' ><br><br>"+
    "DOF: <input id='DOF"+$("#NoPersons").val()+ "' name='DOF"+$("#NoPersons").val()+"' value='' >"+
    "Phone: <input id='Phone"+$("#NoPersons").val()+ "' name='Phone"+$("#NoPersons").val()+"' value='' >"+
    "Email: <input id='Email"+$("#NoPersons").val()+ "' name='Email"+$("#NoPersons").val()+"' value='' >"+
    "Status: <input id='Status"+$("#NoPersons").val()+ "' name='Status"+$("#NoPersons").val()+"' value='' size='5' ><br><br>"+
    "</div>";    
 }
 $("document").ready(function(){
        $("#Save").click(function(){  	          
        $.post('SaveEdit.php', $("#info").serialize(),  
                function(data) { 
                    alert(data);
                $('#message').html(data).show().fadeOut(5000);            
                 }); 
            });
        $("#AddOne").click(function(){
            $("#persons").append(BuildAContact());
             $("#person"+$("#NoPersons").val()).hide().slideDown(500);
         });
    });
</script>