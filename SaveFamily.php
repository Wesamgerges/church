<?php require_once 'include/Connection.php';?>
<?php
	// save the family and return the family id
	if(!($_POST["FirstName1"]=="")){
	    $Save = new Connection();
	    $FamilyID = $Save->InsertQuery
	     ("INSERT INTO family (HouseNo,Floor,street,City,State,ZIP)
	                            VALUES('".$_POST["HouseNo"]."','".$_POST["Floor"]."','".$_POST["Street"]."',
	                            '".$_POST["City"]."','".$_POST["State"]."','".$_POST["ZIP"]."')");
	    // ETRAT FOR EACH PERSON
	    for($NoPersons=1;$NoPersons<=$_POST["NoPersons"];$NoPersons++){
		    if(($_POST["FirstName".$NoPersons]=="")) break;
		    $MemberId = $Save->InsertQuery
		    ("INSERT INTO person (FirstName,LastName,native_name,Phone,DOF,Email,status)
		                       VALUES ('".$_POST["FirstName".$NoPersons]."','".$_POST["LastName".$NoPersons]."','".$_POST["native_name".$NoPersons]."','".$_POST["Phone".$NoPersons]."',
		                       '','".$_POST["Email".$NoPersons]."',".$_POST["Status".$NoPersons].");");
			$Save->InsertQuery("INSERT INTO relations (FamilyId,MemberId,MemberShipType)
		                       VALUES (".$FamilyID.",".$MemberId.",".$NoPersons.");");
										   
		}
                $result = mysql_query("SET NAMES utf8");//the main trick
		echo "Saved".$_POST["native_name1"];
	}
?>