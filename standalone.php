<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require_once 'include/functions.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Sending Mails</title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder1.js"></script>
	<style>
		td {	
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;				
		   }	
		input[type="checkbox"]:checked+label, input[type="radio"]:checked+label{ font-weight: bold;color: #000; } 
		input[type="checkbox"]+label, input[type="radio"]+label{color: #777;}
	</style>
	

	<link href="include/stylesheet1.css" media="all" rel="stylesheet" type="text/css" />
	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>	
</head>
<body>
		<form action="_posteddata.php" method="post">
		<div align="center">
	 	<table>
	 		<tr>
	 			<td width="400px" align="center">
	 					 							
	 						
	 				<fieldset >
	 					
	 					<legend>Meetings</legend>
	 					<table>
	 					<tr>
	 						<td >
	 					<?php getAllMeetings();?>
	 				</td>
	 				<td>
	 				
		
	 	<?php
	 	   $weeklyMeetings = new Connection();
		   $weeklyMeetings -> Query("
			 					SELECT * 
								FROM weeklymeeting
								WHERE meetingid = 2
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
	 					</tr>
	 				</table>
	 	</fieldset>
	 	
	 			</td>
	 			<td>
	 				<fieldset>
	 					<legend> Options </legend>
	 				
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
		 		</td>
  		  		<td>
  		  			
  		  		</td>
		 		<td></td>
  		 	 </tr>
		</table>
		
		</fieldset>
		</td>
  		  </tr>
	 		
	 	</table>
		</div>
  	  
		<table height="300px" width="100%">
			<tr>
				<td >
					<h3>To:</h3>	
					<fieldset>
						
						<legend>Members</legend>
						<div id = "Servants" style="height: 144px;overflow:auto;">
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
 	   	<table width="100%">
	   		<tr>
		<td>
	 		<p>
			<label for="subject">
			<h3>Subject: <input type="text" id="subject" name="subject" value="[Tested] miss u {name}"/></h2>
			</label>
		</p>
		  <?php  $templates = new Connection();
   				 $templates ->Query("
			    						SELECT * FROM ".TEMPLATE_TBL." 
			    						" ."
			    				   ");
	   ?>
	   			</td>
	   			<td align="right">
	   				<div align="right" id="CB_templates">
				
					</div>
				</td>
				<td>				
					<input type="button" value="Preview" onclick="preview()" /><br/>
					<input type="button" value=" Use " onclick="useTemplate()" /><br/>
					
				</td>
	   		</tr>
	   	</table>
		<table width="100%">
			<tr>
				<td>
					<p>
						<label for="maileditor">
						<h3>Body: </h3></label>
					</p>
				</td>
				<td align="right" valign="bottom">
					<input type="button" value=" save as " onclick="saveAs()"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p>
						<textarea id="maileditor" name="maileditor" rows="10" cols="80"></textarea>		
						<input type="submit" value=" send "/>						
					</p>
				</td>
				
			</tr>
		</table>
	</form>
  	<script language="JavaScript">	
  	{
	var editor = CKEDITOR.replace( 'maileditor',{
	 		filebrowserBrowseUrl : 'pdw_file_browser/index.php?editor=ckeditor',
            filebrowserImageBrowseUrl : 'pdw_file_browser/index.php?editor=ckeditor&filter=image',
            filebrowserFlashBrowseUrl : 'pdw_file_browser/index.php?editor=ckeditor&filter=flash',
            pasteFromWordRemoveFontStyles : false,
           }
	 );
	editor.setData( '<p>Just click the <b>Image</b> or <b>Link</b> button, and then <b>&quot;Browse Server&quot;</b>.</p>' );
	}
		$.get("templates/template1.html" ,function(data){					
					editor.setData(data);
					//alert(editor.getData());
			});
			
		function useTemplate(){
			var agree=confirm("This will replace the current editor contants with the selected template,\nAre you sure?");
			if (agree)
			
			$.get('previewTemplate.php?id='+$("#tempaltes").val(),function(data){					
					editor.setData(data);
					//alert(editor.getData());
			});
		}		
		function getTemplates(){
			$.post("gettemplates.php",function(data){
				$("#CB_templates").html(data);				
			});
		}
 		function getInformation()
 		{
	  		$.post("MailingFunctions.php",
				$("form").serialize(),	  			
	  			function(data){				
					$("#Servants").html(data);
			 });
 		}
 		function preview()
		{		
			previewWindow = window.open('previewTemplate.php?id='+$("#tempaltes").val(),'','width = 600,height = 500,left = 300,top = 100');
		}
		function saveAs()
		{	
			var name = prompt("Template Name:","templename");	
			if (name!=null && name!="")
			{
				$.post("SaveTemplate.php",
						{"name":name,"template":editor.getData()},	  			
			  			function(data){	
			  				getTemplates();								
							alert(data);
				 });
			//previewWindow = window.open('SaveTemplate.php?template='+editor.getData(),'','width = 600,height = 500,left = 300,top = 100');
			}
		}
	$("document").ready(function(){ 
			getTemplates();
				
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
</html>


<?php /*
 * 
 * 	// Just call CKFinder.setupCKEditor and pass the CKEditor instance as the first argument.
	// The second parameter (optional), is the path for the CKFinder installation (default = "/ckfinder/").
	//CKFinder.setupCKEditor( editor, 'ckfinder/' ) ;

	// It is also possible to pass an object with selected CKFinder properties as a second argument.
	// CKFinder.setupCKEditor( editor, { basePath : '../', skin : 'v1' } ) ;
 * 
			// Include the CKEditor class.
			include_once "ckeditor/ckeditor.php";
			include_once 'ckfinder/ckfinder.php';
			
			// The initial value to be displayed in the editor.
			$initialValue = '<p>This is some <strong>sample text</strong>.</p>';
			// Create a class instance.
			$CKEditor = new CKEditor();
			// Path to the CKEditor directory, ideally use an absolute path instead of a relative dir.
			//   $CKEditor->basePath = '/ckeditor/'
			// If not set, CKEditor will try to detect the correct path.
			$CKEditor->basePath = 'ckeditor/';
			$ckfinder = new CKFinder();
			$ckfinder->BasePath = './ckfinder/'; // Note: the BasePath property in the CKFinder class starts with a capital letter.
			$ckfinder->SetupCKEditorObject($ckeditor);
			// Create a textarea element and attach CKEditor to it.
			$CKEditor->editor("maileditor", $initialValue);
		*/?>