<?php require_once("include/session.php"); ?>


<?php require_once 'include/Connection.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<?php
$_GET['MeetingId'] = 2;
$_GET['currentMeetingId'] = 52;

   $getLastWeeksMeetingsId = new Connection();
   $getLastWeeksMeetingsId->Query(" SELECT *, count(*) as c FROM `weeklymeeting`, meetingattendance 
   	WHERE MeetingId = {$_GET['MeetingId']}  AND weeklymeeting.id = meetingattendance .weeklyMeetingId   	
	group by weeklyMeetingId
	ORDER BY weeklymeeting.Date DESC
	LIMIT 5;");
	$getLastWeeksMeetingsId->Results = array_reverse($getLastWeeksMeetingsId->Results) ;
  
   
   
?>

       

<title>Show Members </title>

<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<h1 align='center'> Family of life Members </h1>
<?php
    //{$_GET['MeetingId']}
    $AbsentMembers = new Connection();
    $AbsentMembers ->Query("SELECT * FROM membermeeting, person WHERE  membermeeting.meetingId = {$_GET['MeetingId']} AND  
							person.id=memberid  AND memberid  
							NOT IN (
									SELECT memberid FROM meetingattendance WHERE  
									meetingattendance.weeklyMeetingId = {$_GET['currentMeetingId']}
									)
							ORDER BY FirstName;
							");   
    

?>

	<table class="attendanceTable" align="center" cellpadding="10px" width="800px" >
	    <tr class="attendanceHeader highLight" >
	        <td align="center">
	           Name
	        </td>
      
	        <td align="center">
	            Phone
	        </td>
	        <td align="center">
	            Email
	        </td>
	         <td align="center">
	            Marital Status
	        </td>
	   </tr>

<?php
$i=1;
foreach ($AbsentMembers->Results as $person)
{
?>
    <tr class='attendanceCell' id='<?php ?>' >
        <td class='fn attendanceCell'>
        	<?php echo "[".$i++."] "?> <strong>
            <?php echo $person["FirstName"]. " ".$person["LastName"];?>
            </strong>
        </td>
        <td>
            <?php
          	if( $person["Phone"]=="") echo " ";
             	echo $person["Phone"]
             ?>
        </td>
        <td class='attendanceCell' >
             <?php 
           	if( $person["Email"]=="") echo " "; 
            	 echo str_replace (",",",<br/>",$person["Email"]);
             ?>
        </td>
         <td class='attendanceCell' align="center">
            <?php echo  $person["Status"]?>
        </td>
   </tr>

<?php
}

?>
</table>

</body>
</html>