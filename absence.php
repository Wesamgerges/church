<?php require_once 'include/Connection.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<title>Show Absence </title>
</head>
 
  <body>
  	<h1 align="center"> Absent Members </h1>
<?php
    //{$_GET['MeetingId']}
    $AbsentMembers = new Connection();
    $AbsentMembers ->Query("SELECT * FROM membermeeting, person WHERE  membermeeting.meetingId = 2 AND  
							person.id=memberid  AND memberid  
							NOT IN (
									SELECT memberid FROM meetingattendance WHERE  
									meetingattendance.weeklyMeetingId = 30
									)
							");   
    
   
?>

	<table border=1 align="center">
	    <tr class="highLight bold">
	        <td >
	            FirstName
	        </td>
	        <td >
	            LastName
	        </td>
      
	        <td >
	            Phone
	        </td>
	        <td >
	            Email
	        </td>
	         <td >
	            Status
	        </td>
	   </tr>

<?php
$i=1;
foreach ($AbsentMembers->Results as $person)
{
?>
    <tr class='abc <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php ?>' >
        <td class='fn'>
            <?php echo $person["FirstName"]?>
        </td>
        <td>
            <?php echo $person["LastName"]?>
        </td>
      
        <td>
            <?php
          	if( $person["Phone"]=="") echo ".";
             	echo $person["Phone"]
             ?>
        </td>
        <td>
             <?php 
           	if( $person["Email"]=="") echo "."; 
            	 echo $person["Email"]
             ?>
        </td>
         <td>
            <?php echo  $person["Status"]?>
        </td>
   </tr>

<?php
}

?>
</table>

</body>
</html>
