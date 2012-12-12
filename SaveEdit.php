<?php require_once 'include/Connection.php';?>
<?php

    $Save = new Connection();
    $FamilyID = $Save->InsertQuery
     ("UPDATE Family SET HouseNo = '".$_POST["HouseNo"]."',Floor = '".$_POST["Floor"]."',
                                   street = '".$_POST["Street"]."',City = '".$_POST["City"]."',
                                   State = '".$_POST["State"]."',ZIP = '".$_POST["ZIP"]."'
                                   WHERE ID=".$_POST["FamilyID"]);
    for($NoPersons=1;$NoPersons<=$_POST["NoPersons"];$NoPersons++)
    $Save->InsertQuery
    ("UPDATE person SET FirstName = '".$_POST["FirstName".$NoPersons]."',
                       LastName = '".$_POST["LastName".$NoPersons]."',
                       Phone = '".$_POST["Phone".$NoPersons]."',DOF = '".$_POST["DOF".$NoPersons]."',
                       Email = '".$_POST["Email".$NoPersons]."' WHERE ID= ".$_POST["person".$NoPersons]."; ");
    
echo "Saved";
?>