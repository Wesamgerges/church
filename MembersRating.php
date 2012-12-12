<?php require_once 'include/Connection.php';?>
<?php  require_once 'include/RatingBar.php'?>
<?php
	$meetingid = $_POST["meetingid"];
	$orderby = $_POST["orderby"];
	$order = $_POST["order"];
    $persons = new Connection();
    $persons ->Query("    
						
						SELECT *, s1.AttendedMeetings/s2.TotalMeetings AS rating, s1.Member_id FROM
						(
							SELECT 
								`membermeeting` .`MemberId` as Member_id, count(weeklymeeting.id) as AttendedMeetings 
							FROM 
								weeklymeeting, `meetingattendance` ,membermeeting
							WHERE
								membermeeting.meetingid = {$meetingid}
								AND membermeeting.meetingid = weeklymeeting.meetingid 
								AND `meetingattendance` .weeklymeetingid = weeklymeeting.id
								AND membermeeting.`MemberId` = meetingattendance.`MemberId`
								AND  weeklymeeting.id  >= firstmeetingid
							GROUP BY `membermeeting` .`MemberId` 
						) AS s1 ,
						(
							SELECT 
								`membermeeting` .`MemberId` as i , count(weeklymeeting.id) as TotalMeetings 
							FROM 							
								weeklymeeting ,membermeeting							
							WHERE
								membermeeting.meetingid = {$meetingid}
								AND membermeeting.meetingid = weeklymeeting.meetingid 
								AND  weeklymeeting .Id >= firstmeetingid
							GROUP BY `membermeeting` .`MemberId` 							
						) AS s2, person
						  WHERE s1.Member_id=s2.i
								AND person.id = s1.Member_id
    				 ORDER BY {$orderby} {$order}
    				 ");   
?>

	<table class="attendanceTable" align="center" cellpadding="10px" width="800px" >
	    <tr class="attendanceHeader highLight" >
	        <td align="center">
	           <input type="button" value=" Name " id="FirstName" onclick="changeOrder(0)"/> 
	        </td>
	        <td align="center">
	            Phone
	        </td>
	        <td align="center">
	            Email
	        </td>
	         <td align="center">
	           <input type="button" value=" Rating " id="rating" onclick="changeOrder(1)"/> 
	        </td>
	   </tr>

<?php
$i=1;
foreach ($persons->Results as $person)
{
?>
    <tr class='attendanceCell <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php ?>' >
        <td class='fn attendanceCell'>
        	<strong>
            <?php echo $person["FirstName"] . " ".$person["LastName"]; ?>
            </strong>
        </td>
      
        <td>
            <?php
          	if( $person["Phone"]=="") echo "";
             	echo $person["Phone"]
             ?>
        </td>
        <td class='attendanceCell'>
             <?php 
           	if( $person["Email"]=="") echo " "; 
            	 echo str_replace (",",",<br/>",$person["Email"]);
             ?>
        </td>
         <td class='attendanceCell' align="center">
            <?php BuildRating( $person["rating"]*100); echo round($person["rating"]*100) ."%<br/>(".$person["AttendedMeetings"]."/".$person["TotalMeetings"].")"; ?>
        </td>
   </tr>

<?php
}

?>
</table>

<br>