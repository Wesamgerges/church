<?php require_once 'include/Connection.php';?>

<?php 
	//MailingFunctions.php
	$AttendedPersons = new Connection();
	function getAddenance()
	{
		global $AttendedPersons ;
   		$AttendedPersons -> Query("SELECT * FROM person,meetingattendance WHERE person.id=meetingattendance.MemberId AND meetingattendance.weeklyMeetingId = ".$_POST["weeklymeeting"]." ORDER BY FirstName");		
	}
	
	function getServants()
	{
    		global $AttendedPersons ;
    		$AttendedPersons -> Query("SELECT * FROM ".ServantsTable. " , ". PersonsTable ." WHERE ".ServantsTable.".Memberid = ".PersonsTable.".id AND meetingId = ".$_POST["Meetings"]);
	}
	
	function getabsence()
	{
    		global $AttendedPersons ;
    		$AttendedPersons -> Query("
    				SELECT * FROM membermeeting, person WHERE  membermeeting.meetingId = ".$_POST["Meetings"]." AND  
					person.id=memberid  AND memberid  
					NOT IN (
								SELECT memberid FROM meetingattendance WHERE  
								meetingattendance.weeklyMeetingId = ".$_POST["weeklymeeting"]."
							)
					ORDER BY FirstName;
					");    		
	}
		switch ($_POST["group"]) {
			case 'Members':				
				if(isset($_POST["subgroup"]["absence"])){
					getabsence();
					BuildList();
				}
				
				if(isset($_POST["subgroup"]["Attenance"])){
					getAddenance();
					BuildList();
				}
		
			break;
			case 'Servants':
				getServants();
				BuildList();
			break;
	}
	
    function BuildList(){
		global $AttendedPersons;		
?>		
		   <table cellspacing="8px" align="center" width="950px" >
		    <tr>
			<?php 
				$addRow = 0;
				foreach($AttendedPersons -> Results as $attendee){
					if($addRow++ % 5 == 0){
			?>
		 </tr>
		 <tr>
		  <?php }?>
			  <td ="td<?php echo $attendee["ID"] ?>" width="20%">
			  	
				<input type="checkbox" id="m<?php echo $attendee["ID"] ?>" class="tabledata" name="members[]" 
				value="<?php echo "".$attendee["ID"].";#".$attendee["FirstName"].";#".$attendee["LastName"].";#".$attendee["Email"]."" ?>" checked=checked/>
				
			 	<label title = "<?php echo ($attendee["Email"]  ==  "" ? 'no e-mail provided' : $attendee["Email"] ) ;?>" for="m<?php echo $attendee["ID"] ?>" >
			 	<?php echo $attendee["FirstName"]. " " .$attendee["LastName"]; ?> 
			 	</label>
			  </td>
			  <td></td>
		 <?php
			}
		 ?>
	  </tr>
	 </table>
<?php }?>