<?php require_once 'include/Connection.php';?>
<?php
$searchword = $_POST["searchWord"];
$sizeOfTheBox = 5;
    $persons = new Connection();
    $persons->Query("SELECT * FROM person,relations WHERE person.id=relations.MemberId AND (firstname like '{$searchword}%' ) LIMIT 15;");   
	//if(count($persons->Results) === 0)die;
	if(count($persons->Results)<5 ) $sizeOfTheBox = count($persons->Results);
	if(count($persons->Results)== 1) $sizeOfTheBox = 2
?>
 
 <?php
 $i=1;
 $searchOutput = "<div id='searchResult' > 	<ul> ";
 foreach ($persons->Results as $person){
 	$searchOutput .= "<li id='".$i++."' type='none' onClick=\"getSelectedItem($(this).val(),".$person["FamilyId"].");\" onmouseover=\"setSelectItem($(this).attr('id'));\" 
 					value='".$person["MemberId"]."'><img src='images/cross-icon.png' width='50'height='50' align='middle' />  ".$person["FirstName"] ." ".$person["LastName"]."</li>" ;
?>    	

  	 
<?php
}
 $searchOutput .= " </ul> </div>";
 if(count($persons->Results) === 0)die("No Results -=+ ") ;
?>
		
<br/>

<table width="100%">
    <tr>
    	<td>
    		No.
    	</td>
        <td >
            First Name:
        </td>
        <td >
            Last Name:
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
        <td></td>
   </tr>
<?php
	foreach ($persons->Results as $person){
?>
    <tr class='abc' >
    	<td>
    		<?php echo "(" .$person["MemberId"] .")"?>
    	</td>
        <td class='fn'>
            <?php echo $person["FirstName"]?>
        </td>
        <td>
            <?php echo $person["LastName"]?>
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
        <td><a href="EditFamily2.php?FamilyID=<?php echo $person["FamilyId"]?>" >edit</a></td>
   </tr>

<?php
}

?>
   </table>
<br>
-=+
<?php echo $searchOutput; ?>