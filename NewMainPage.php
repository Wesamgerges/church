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

<title> Main Page </title>
</head>
 
  <body>  
  	<a href='logout.php' id='loginlink' class="mainIconLink">Log Out</a>
  	<br/><br/>
<?php 
	$MainIcons = array(
						array(
							array("AddFamily.php","add_male_user_128.png"," Add Member "),
							array("ShowAllPersons.php","user-group-icon 256.gif"," Show All Members "),
							array("EasySearch.php","SearchIcon2.gif"," Search ")
							),
						array(
							array("setWeeklyMeeting.php","Attendance_Icon2.gif"," Attendance "),
							array("ManageMembersServants.php","ManageUsers-icon.gif"," Mange Servants ")  							
							)
					);
?>	

	<table class="" align="center" >
		<?php for( $i = 0 ; $i < count( $MainIcons ) ; $i++ ) { 	?>
	    <tr>
		<?php for( $j = 0 ; $j < count( $MainIcons[$i] ) ; $j++ ) {	?>
			
	        <td align="center" width="180" height="180">
	        	<div align="center" >
	        		<a href="<?php echo $MainIcons[$i][$j][0] ?>" class="mainIconLink">
	        			<img class="mainIcons" src="images/<?php echo $MainIcons[$i][$j][1] ?>" width="128px" height="128px" />
	        			<br>
						<p > <?php echo $MainIcons[$i][$j][2] ?> </p>	        			
	        		</a>
	        		
	        	</div>
			</td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>


</body>
</html>