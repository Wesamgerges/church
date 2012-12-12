<?php require_once("include/session.php"); ?>
<?php 
	if (!logged_in()) {
		redirect_to("logIn.php");
	}
?>

<?php require_once 'include/Connection.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages: ['corechart']});
      google.setOnLoadCallback(drawCharts); 
      function drawCharts()
      {
      	drawVisualization();
      	drawChart();
      }  
      function drawVisualization() {
        // Create and populate the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'x');
        data.addColumn('number', 'Attendance');
        
<?php
   $getLastWeeksMeetingsId = new Connection();
   $getLastWeeksMeetingsId->Query(" SELECT *, count(*) as c FROM `weeklymeeting`, meetingattendance 
   	WHERE MeetingId = {$_GET['MeetingId']}  AND weeklymeeting.id = meetingattendance .weeklyMeetingId   	
	group by weeklyMeetingId
	ORDER BY weeklymeeting.Date DESC
	LIMIT 5;");
	$getLastWeeksMeetingsId->Results = array_reverse($getLastWeeksMeetingsId->Results) ;
  
   foreach($getLastWeeksMeetingsId->Results as $r)
   {
   	echo "data.addRow(['".$r['Date']."',".$r["c"]. "]);";
	 
	
   }
   
?>

 // Create and draw the visualization.
        new google.visualization.LineChart(document.getElementById('visualization')).
            draw(data, {curveType: "function",
                        width: 650, height: 400,
                        vAxis: {maxValue: 10}}
                );
      }
      
<?php
    $TotalAttendance = new Connection();
    $TotalAttendance ->Query("SELECT count(*) as TotalAttendance FROM meetingattendance WHERE  meetingattendance.weeklyMeetingId = {$_GET['currentMeetingId']} ");   
    
    $TotalMembers = new Connection();
    $TotalMembers ->Query("SELECT count(*) as TotalMembers FROM membermeeting WHERE  membermeeting.meetingId = {$_GET['MeetingId']} ");   
    
?>
  function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Members');
        data.addRows([
          
          ["Attended", 		   <?php echo $TotalAttendance->Results[0][0]; ?>],
          ["Didn't Attend",    <?php echo  ($TotalMembers->Results[0][0] - $TotalAttendance->Results[0][0]); ?>]
        ]);

        var options = {
          title: 'Total Members = <?php echo $TotalMembers->Results[0][0]; ?>'
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }   
</script>
<title>Show Attendance </title>

<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<?php
    $persons = new Connection();
    $persons ->Query("SELECT * FROM person,meetingattendance WHERE person.id=meetingattendance.MemberId AND meetingattendance.weeklyMeetingId = {$_GET['currentMeetingId']} ORDER BY FirstName");   
?>
</head>
 
  <body>
  	<h1 align="center"> Attendance </h1>
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
            <?php echo  $person["Status"]?>
        </td>
   </tr>

<?php
}

?>
</table>

<br>

<h1 align="center"> Absence </h1>

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
    <tr class='attendanceCell <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php ?>' >
        <td class='fn attendanceCell'>
        	<strong>
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
<table width="100%">
	<tr>
		<td align="center">
			<div id="visualization" style="width: 550px; height: 400px;" align="center"></div>
			<div id="chart_div" style="width: 900px; height: 500px;"></div>
		</td>
	</tr>
</table>
</body>
</html>