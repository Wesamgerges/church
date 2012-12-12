<?php require_once("include/session.php"); ?>
<?php 
	if (!logged_in()) {
		redirect_to("logIn.php");
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />

<title>Main Page</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script src="include/components.js"></script>

</head>
  <body>
  	
  	<a href='logout.php' id='loginlink'>Log Out</a> 
  	<table cellspacing="5" cellpadding="5" align="center" class="meeting">
	<tr>
		<td><a href="AddFamily.php">Add Family</a></td>
		<td><a href="ShowAllPersons.php">Show All Persons</a></td>
		<td><a href="EasySearch.php"> Search </a></td>
		<td><a href="setWeeklyMeeting.php"> Attendance </a></td>
		<td><a href="ManageMembersServants.php"> Manage Members Servants </a></td>
		<td></td>								
	</tr>
</table>
<br/>
</br/>

</body>
</html>