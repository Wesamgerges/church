<title>Show Attendance </title>

<?php require_once 'include/Connection.php';?>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<?php
    $persons = new Connection();
    $persons ->Query("SELECT *, count(*) as c 
FROM `weeklymeeting`, meetingattendance, person

WHERE 
person.id = MemberId AND
MeetingId = 2 AND weeklymeeting.id = meetingattendance .weeklyMeetingId AND 

Date >= '2012-01-25'
group by MemberId
order by c ");   
?>
</head>
 <h1 align="center"> Show All Persons </h1>
  <body>
	<table border=1 align="center">
	    <tr class="highLight bold">
	        <td >
	            FirstName
	        </td>
	        <td >
	            LastName
	        </td>
	<!--        <td >
	            DOF
	        </td>
	--->        
	        <td >
	            Phone
	        </td>
	        <td >
	            Email
	        </td>
	         <td >
	            Status
	        </td>
	         <td >
	            Count
	        </td>
	   </tr>

<?php
$i=1;
foreach ($persons->Results as $person)
{
?>
    <tr class='abc <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php ?>' >
        <td class='fn'>
            <?php echo $person["FirstName"]?>
        </td>
        <td>
            <?php echo $person["LastName"]?>
        </td>
<!---        <td>
            <?php echo ".".$person["DOF"]?>
        </td>
--->        
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
          <td>
            <?php echo  $person["c"]?>
        </td>
   </tr>

<?php
}

?>
</table>
