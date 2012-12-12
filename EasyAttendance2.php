<?php require_once 'include/Connection.php';?>

<!DOCTYPE html>

<html lang="en">
<head>
	<title> Fast Attendance Page </title>
	<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
	<script language="javascript" src="<?php echo JQueryPath; ?>"></script>
	<style type="text/css">
		
		.rounded 	{			
						border:1px solid #EEE;
						font-family: Arial, Helvetica, sans-serif;
						font-size: 24px;
						padding: 15px;
						
						font-weight: bold;
						-moz-border-radius: 15px;
						-webkit-border-radius: 15px;
						border-radius: 15px;
					
						behavior: url(ie-css3.htc);
		}
		
		.element	{ position:fixed; top:0; left:0; padding:10px; font-family:Arial; background:#EEF;z-index: 2;  }
		.element2	{ position:fixed; top:0; right:0; padding:10px; font-family:Arial; background:#EEF;z-index: 2;  }
		.element3	{ 
						position:fixed; bottom:0; right:40%; padding:10px; font-family:Arial; background:Yellow;z-index: 2;  opacity:0.8;
	  				  	filter:alpha(opacity=80); font-weight: bold; color:Green;
	  	}
		.select {background:#4EEF07; font-weight: bold;}
	</style>

</head>

<body>		
<?php
	$MeetingId = 2;
	$currentMeetingId = 40;
	
	if(isset($_GET["Meetings"])) $MeetingId = $_GET["Meetings"];
	if(isset($_GET["currentMeetingId"])) $currentMeetingId = $_GET["currentMeetingId"];
	
    $persons = new Connection();

	$persons -> Query("
					SELECT * 
					FROM (
						SELECT * FROM ". 			
							 PersonsTable.",". MemberMeetingTable.
							" WHERE ".PersonsTable.".id = ".MemberMeetingTable.".memberid
							 AND meetingid = {$MeetingId}
							) AS t
				
				    LEFT OUTER JOIN ".AttendanceTable.
					" ON
						t.MemberId =  ".AttendanceTable.".memberid 
						AND ".AttendanceTable.".weeklyMeetingId = {$currentMeetingId}
						order by t.FirstName    					 
");
?>
  	<br/>
  	<div class = "element" style = "width: 30px;height: 100%;" align = "center">
  		<table>
  			<?php 
  				for($i = 0; $i < 26; $i++){
  			?>
  			<tr>
  				<td>
  					<a href="#<?php echo chr($i+65);?>"> <?php echo chr($i+65);?> </a>
  				</td>
  			</tr>
  			<?php }?>
  		</table>
  	</div>
  	 	<div class = " element2 " style = " width: 200px; height: 95%; overflow: auto " align = " center ">
  		
  	</div>
  	<div id = "Message" class="element3" align = 'center' style="width: 250px;height: 23px;overflow: auto"> </div>
	<input type = "hidden" id = "currentMeetingId"  value = "<?php echo $currentMeetingId; ?>"	/>
	<input type = "hidden" id = "MeetingId" 		value = "<?php echo $MeetingId; ?>"			/>
	<div style=" width : 85%" >
	<table align="center" cellpadding="3px" width="50%" >
	
<?php
	$i = 1;
	$CharacterAnchor = "A"; 
	foreach ($persons->Results as $person)
	{
		if($CharacterAnchor != $person["FirstName"][0] )
			$CharacterAnchor = $person["FirstName"][0];
?>
    <tr>    	
        <td >
        	<div class='anchor rounded <?php if(( $i++ ) % 2 == 0) echo " "; if ($person["weeklyMeetingId"] != NULL) echo " select "?>' align="center" id = "<?php echo $person[0]; ?>">
           <a  name="<?php echo $CharacterAnchor; ?>" > 
           		<?php echo $person["FirstName"] . " ".$person["LastName"]; ?>
           </a>
           </div>           
        </td>          
   </tr>
	<?php
	}	
	?>
	</table>
	</div>
	<br/>
<br/>
<br/>
<br/>

<br/>
<br/>

<script>

	function BuildAttandanceList()
	{
		var ht = "<table cellpadding = '5px'>";
		var count = 0;
		$(".select").each(function(index,dom){
			count++;
			ht += " <tr> <td> " + $(this).find("a").text() + " </td> </tr> ";
		});
		ht += "</table>";
		$(".element2").html("<div align = 'center'> <strong>" + count + "</strong>" + ht + " </div> ");
	
	}

	$("document").ready(function(){
		$("#Message").hide();
		BuildAttandanceList();
		
		$(".anchor").click(function(){			
			
			$(this).toggleClass("select");
			$.post("SaveAttendance2.php",{id:$(this).attr("id"), weeklyId:<?php echo $currentMeetingId; ?>},function (d){
				$("#Message").html("Saved").fadeIn("500").delay(1000).fadeOut(500);				
			});
			BuildAttandanceList();
		});	
		
	});
</script>
</body>

</html>



