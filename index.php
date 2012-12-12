<?php require_once ("include/Config.php"); ?>
<script> window.location = "<?php echo MainPage; ?>"; </script>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />

<title>Search</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>

</head>
  <body>
  	<table cellspacing="5" cellpadding="5" align="center" class="meeting">
	<tr>
		<td><a href="AddFamily.php">Add Family</a></td>
		<td><a href="ShowAllPersons.php">Show All Persons</a></td>
		<!-- <td><a href="EditFamily2.php">Edit Family</a></td> -->
		<td><a href="EasySearch.php"> Search </a></td>
		<td></td>								
	</tr>
</table>
<br/>
<!---
<a href="AddFamily.php">AddFamily.php</a><br/>
<a href="ShowAllPersons.php">ShowAllPersons.php</a><br/>
<a href="EditFamily2.php">EditFamily.php</a><br/>
<a href="SmartSearch.php">SmartSearch.php</a><br/>

--></br/>

</body>
</html>