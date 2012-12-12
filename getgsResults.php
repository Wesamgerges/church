<?php require_once 'include/Connection.php';?>
<?php
$searchword = $_POST["searchWord"];
$MeetingId = $_POST["MeetingId"];

$sizeOfTheBox = 5;
    $persons = new Connection();
    $persons->Query(
   				 "SELECT  DISTINCT   P.* FROM (
   				 SELECT *
				 FROM person, relations
				 WHERE person.id=relations.MemberId AND (firstname like '{$searchword}%' ))  as P
				 LEFT JOIN membermeeting ON P.MemberId = membermeeting.MemberId 
				 ORDER BY (CASE WHEN membermeeting.meetingid = {$MeetingId} THEN 0
				ELSE 1
				END),firstname LIMIT 10;"
    );
    //"SELECT * FROM person,relations WHERE person.id=relations.MemberId AND (firstname like '{$searchword}%' ) LIMIT 5;");   
	if(count($persons->Results) === 0)die;
	if(count($persons->Results)<5 ) $sizeOfTheBox = count($persons->Results);
	if(count($persons->Results)== 1) $sizeOfTheBox = 2
?>
 <div id="searchResult" >
 	<ul>
 <?php
 $i=1;
 foreach ($persons->Results as $person)
	{
?>    	
   <li id="<?php echo $i++;?>" type="none" onClick="getSelectedItem($(this).val(),<?php echo $person["FamilyId"]?> );" onmouseover="setSelectItem($(this).attr('id'));"  value="<?php echo $person["MemberId"]?>"><?php echo $person["FirstName"] ." ".$person["LastName"]?></li> 
<?php
}
?> 
		
 	</ul>
 </div>
<br/>