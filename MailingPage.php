<?php require_once 'include/Connection.php';?>

<HTML>
	<HEAD>
		<style>
			td {	
					font-family: Arial, Helvetica, sans-serif;
					font-size: 16px;				
				}	
			input[type="checkbox"]:checked+label, input[type="radio"]:checked+label{ font-weight: bold;color: #000; } 
			input[type="checkbox"]+label, input[type="radio"]+label{color: #777;}
		</style>
		
		<link href="include/stylesheet1.css" media="all" rel="stylesheet" type="text/css" />
		<script language = "javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>	
	
	</HEAD>
	
	<body>
		
	 <form>
	 	<table>
	 		<tr>
	 			<td>
	 	<select name="MeetingId">
		<?php 
			$meetings = new Connection();
			$meetings->Query("SELECT * FROM meetings ORDER BY Mname");
			foreach($meetings->Results as $meeting){
		?>
			<option value="<?php echo $meeting["Id"]?>"><?php echo $meeting["Mname"]?>
			
			</option>
			<?php }?>
		</select>
	 	<?php
	 	   $weeklyMeetings = new Connection();
		   $weeklyMeetings -> Query("
			 					SELECT * 
								FROM weeklymeeting
								WHERE meetingid =2
								ORDER BY DATE DESC
							");
	 	?>
	 	<div>
	 		<select size="5" style="width : 150px" name="weeklymeeting" id = "weeklymeeting">
	 			<?php
	 			foreach ($weeklyMeetings->Results as $meeting)
				{
	 			?>
	 				<option value = "<?php echo $meeting["Id"]?>" ><?php echo $meeting["Date"] ?></option>
	 			<?php 
	 			}?>
	 		</select>
	 	</div>
	 	
	 			</td>
	 			<td>
	 	<table cellpadding = "10px" width = "400px">
	 		<tr>

	 	   		<td colspan=2 align="Center">
					<input type="radio" id = "Members" name="group" value="Members" checked="checked" class='group'/> <label for = "Members"> Members</label>
		   		</td>
		   		<td colspan=2 align="Center">
					<input type="radio"  id = "Servant"	name="group" value="Servants" class='group'/><label for="Servant">  Servants </label><br/>
		   		</td>
		   	</tr>
		   	<tr>
		   		<td>
	 				<input type="checkbox"  name="subgroup[Attenance]" id="Attenance"  value="Attenance" class='group'/> <label for = "Attenance">Attenance</label>
	 	    	</td>
	 	     	<td>
  			 		<input type="checkbox"  name="subgroup[absence]" id="absence" value = "absence" class='group' checked="checked"/> <label for = "absence">absence</label>
  		  		<td>
  		  		</td>
		 		<td></td>
  		 	 </tr>
		</table>
		</td>
  		  </tr>
	 		
	 	</table>
		<table height="300px" width="100%">
			<tr>
				<td >
					<fieldset>
						<legend>Members</legend>
						<div id = "Servants" style="height: 200px;overflow:auto;">
							<?php 
							
							/* 
							 * HERE COMES THE MEMBERS LIST
							 * FOR ATTENDANCE OR absence
							 * 
							 */ 
							 
							?>
	 					</div>
					 </fieldset>
	 				</td>
	 			</tr>
	 			<tr>
	  				<td>
		 				<input type="checkbox" id = "checkall" checked="checked"/> <label for = 'checkall'> Check All </label>
   					</td>
   				</tr>
  			</table>	
  	</form>  
 	<script language="JavaScript">	
 		function getInformation()
 		{
	  		$.post("MailingFunctions.php",
				$("form").serialize(),	  			
	  			function(data){				
					$("#Servants").html(data);
			 });

 		}
 		  $("document").ready(function(){ 
 		  	$("#weeklymeeting option:first").attr('selected','selected');  			
  			$(".group").click(function(){ 
  				getInformation(); 				
				});
			$('#checkall').click(function () {			
				$(".tabledata").attr('checked',this.checked);		
		 	 });
			$("input:checkbox[value=absence]").click();
			$("#weeklymeeting").click(function(){getInformation();});
			$("#absence").attr("checked","checked");
  		});
	</script>   
 </body>
</HTML>



<!-- 
	
				/*.tabledata {/*color: #777;}*/
			/*.highlighttabledata { 
				/*font-weight: bold;
				color: #000;
			}*/
			/*fieldset{border:0;}*/
			/*input[type="checkbox"]:parent {background: #000;}
			/*{
				color: #FFFF00;
			}*/
	
	
		// Highlight Table row on check checkbox
/*		$('.tabledata').change(function(){					
		    var id = $(this).attr('id');
		    var rowId = "#"+id.replace("m", "td");
		    var checker = $(this).checked;
		    if(t)checker = t;
		    	
		    if(checker)
		  	    $(this).addClass("highlighttabledata");
		  	   else
		  	     $(this).removeClass("highlighttabledata");
		});
	*/
	//$(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
	//{dir:$(this).val(),Attenance:$("#Attenance").val(),absence:$("#absence").attr("checked")},
-->