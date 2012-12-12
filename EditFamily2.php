<?php include 'include/GetStatus.php'; ?>
<?php
   $FamilyID = $_GET["FamilyID"] ;
  
   $Family = new Connection();
   $Family->Query("SELECT * FROM family WHERE ID = ".$FamilyID);   

   $Persons = new Connection();
   $Persons ->Query("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND relations.FamilyID = ".$FamilyID." ORDER BY relations.MemberShipType");    
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title>Add Family</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
</head>
  <body>
    <form action="SaveFamily.php" method="post" name="info" id="info" >
    <h1 align="center">Church Membership Registration Form</h1>

<div id="Address" >
	<table>
	<tr>
		<td class="Formlabel" width="50px"> Address: </td>
		<td> <input class="Formtxtbox" id="HouseNo" name="HouseNo"  size='10' value="<?php echo $Family->Results[0]["HouseNo"]?>" > </td>
		<td> <input class="Formtxtbox" id="Floor" name="Floor"  size='10' value="<?php echo $Family->Results[0]["Floor"]?>"> </td>				
		<td> <input class="Formtxtbox" id="Street" name="Street"  value="<?php echo $Family->Results[0]["Street"]?>"> 	</td>				
		<td> <input class="Formtxtbox" id="City" name="City" value="<?php echo $Family->Results[0]["City"]?>"> 	</td>				
		<td> <input class="Formtxtbox" id="State" name="State" value="<?php echo $Family->Results[0]["State"]?>" size='5'> </td>				
		<td> <input class="Formtxtbox" id="ZIP" name="ZIP" value="<?php echo $Family->Results[0]["ZIP"]?>" size='5'> </td>				
	</tr> 
	<tr>
		<td></td>
		<td class="Formlabel"> House No.  </td>
		<td class="Formlabel"> Floor No.  </td>
		<td class="Formlabel"> Street     </td>
		<td class="Formlabel"> City	  </td>
		<td class="Formlabel"> State	  </td>
		<td class="Formlabel"> ZIP	  </td>
	</tr>
   
    </table>
</div>
<br/>
<div id="persons">
<div id="parents">
	<br/>
<div id="person1">
	<table>
	<tr>
		<td class="Formlabel"> Name: </td>
		<td> <input class="Formtxtbox" id="FirstName1" name="FirstName1" value="<?php echo $Persons->Results[0]["FirstName"]?>" > </td>
		<td> <input class="Formtxtbox" id="LastName1" name="LastName1" value="<?php echo $Persons ->Results[0]["LastName"]?>"> </td>				
		<td> <input class="Formtxtbox" id="Phone1" name="Phone1" size='10' value="<?php echo $Persons ->Results[0]["Phone"]?>"> 	</td>				
		<td> <input class="Formtxtbox" id="Email1" name="Email1" value="<?php echo $Persons ->Results[0]["Email"]?>"> 	</td>				
		<td class="status"> <?php creatStatus(1);?>  </td>				
	</tr> 
	<tr>
		<td></td>
		<td class="Formlabel"> FirstName </td>
		<td class="Formlabel"> LastName  </td>
		<td class="Formlabel"> Cell Phone  	  </td>
		<td class="Formlabel"> Email 	  </td>
		<td class="Formlabel"> Status	  </td>
	</tr>   
    </table>
</div>
<br/>

<div id="person2">
	<table>
	<tr>
		<td class="Formlabel" width="50px"> Spouse Name: </td>
		<td> <input class="Formtxtbox" id="FirstName2" name="FirstName2" value="" > </td>
		<td> <input class="Formtxtbox" id="LastName2" name="LastName2" value=""> </td>				
		<td> <input class="Formtxtbox" id="Phone2" name="Phone2" size='10' value=""> 	</td>				
		<td> <input class="Formtxtbox" id="Email2" name="Email2" value=""> 	</td>				
		<td class="status"><?php creatStatus(2);?> </td>				
	</tr> 
	<tr>
		<td></td>
		<td class="Formlabel"> FirstName  </td>
		<td class="Formlabel"> LastName   </td>
		<td class="Formlabel"> Cell Phone  	  </td>
		<td class="Formlabel"> Email	  </td>
		<td class="Formlabel"> Status	  </td>
	</tr>   
    </table>
</div>
</div>
<br/>
<h3>Childern</h3>
<div id="childern">
<br/>	
<div id="person3">
	<table>
	<tr>
		<td class="Formlabel" width="50px">(1) </td>
		<td> <input class="Formtxtbox" id="FirstName3" name="FirstName3" value="" > </td>
		<td> <input class="Formtxtbox" id="LastName3" name="LastName3" value=""> </td>				
		<td> <input class="Formtxtbox" id="Phone3" name="Phone3" size='10' value=""> 	</td>				
		<td> <input class="Formtxtbox" id="DOF3" name="DOF3" size='10' value=""> 	</td>				
		<td> <input class="Formtxtbox" id="Email3" name="Email3" value=""> 	</td>				
		<td class="status">  <?php creatStatus(3);?> </td>	
		<td><input type="button" class="ff" value=" Registered"/></td>			
	</tr> 
	<tr>
		<td></td>
		<td class="Formlabel"> FirstName </td>
		<td class="Formlabel"> LastName  </td>
		<td class="Formlabel"> Cell Phone  	 </td>
		<td class="Formlabel"> DOF	  	  </td>
		<td class="Formlabel"> Email	 </td>
		<td class="Formlabel"> Status	 </td>
		<td></td>
	</tr>   
    </table>
    <br/>
</div>

</div>
</div>
<br/><br/>
<div id="Buttons">
    <input type="hidden" id="NoPersons" name="NoPersons" value="3">
    <input type="button" id="Add" name="Add" value=" Add ">
    <input type="button" id="AddOne" name="AddOne" value=" + ">
    <input type="button" id="RemoveOne" name="RemoveOne" value=" - ">
</div>
<!---------------------	DIALOG ---------------------->
	<div id="getRegisteredUser" style="font-size:65%;" title="Get Users">
		<input id="search" name="search">
    	<input type="button" value="  Search " id="searchbtn" name="searchbtn">
    	<div id="message"></div>
	</div>
<!---------------------------------------------------->	
<script language="javascript" src="include/JavascriptCodes.js"></script>
</form>
 </body>
</html>