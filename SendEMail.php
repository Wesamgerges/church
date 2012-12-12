<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require_once 'include/functions.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Sending Mails </title>
	<meta content="text/html; charset=utf-8" http-equiv="content-type"/>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<style>
	input, select{
		font-family: Arial, Helvetica, sans-serif;
			
	}
		td {	
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;				
		   }	
		input[type="checkbox"]:checked+label, input[type="radio"]:checked+label{ font-weight: bold;color: #000; } 
		input[type="checkbox"]+label, input[type="radio"]+label{color: #777;}
	
	</style>
	<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>	
</head>
<body>
		<form action="_posteddata.php" method="post" onsubmit="CheckFields();">
		<div align="center">
	 	<table>
	 		<tr>
	 			<td width="400px" align="center">
	 					 							
	 						
	 				<fieldset >	 					
	 					<legend  align="left">Meetings</legend>
	 					<table>
	 					<tr>
	 						<td >
	 							<?php getAllMeetings();?>
			 				</td>
			 				<td>
			 					
						 	<div>
						 		<?php getWeeklyMeetings();?>
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
					 	   		<td colspan = 2 align="Center">
									<input type="radio" id = "Members" name="group" value="Members" checked="checked" class='group'/> <label for = "Members"> Members</label>
						   		</td>
						   		<td colspan = 2 align="Center">
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
					<table width="100%">
						<tr>
							<td valign="top" width="50px">
								<h3>To:</h3>
							</td>
						
							<td>
							<fieldset>
								
								<legend align="left"> Members </legend>
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
					</table>
	 				</td>
	 			</tr>
	 			<tr>
	  				<td>
	  					<table width="100%">
	  					<tr>
	  						<td>
	  							<input type="checkbox" id = "checkall" checked="checked"/> <label for = 'checkall'> Check All </label>
	  						</td>
		  					<td align="right">
		  						<input type="checkbox" id = "CC" name = "CC" /> <label for = 'CC'> Send as CC </label>
		  					</td>
		 					
   							</tr>
	  					</table>
   					</td>
   					
   				</tr>
   				<tr>
   					<td>
   						<table cellspacing="0" cellpadding="0" border="0" style="padding: 0; margin: 0">
   							<tr>
   								<td height="50px">   									
   									<h4> Add More Emails: </h4>   									
   								</td>
   								<td>   									
   									<textarea style="height: 50px;" size="20" cols="50" id="moreList" name="moreList"></textarea>
   								</td>
   							</tr>
   							<tr>
   								<td valign="top">   									
   								</td>
   								<td  align="left" valign="top">
   								 	<div style="font-size: 12px"> Mina Zaky:m.zaky@yahoo.com,Ayman khalil:akhalil@gmail.com </div>
   								</td>
   							</tr>
   						</table>  
   					</td>
   				</tr>
  			</table>	
 	   	<table width="100%">
	   		<tr>
				<td>	 		
					<label for="subject">
					<h3>Subject: <input type="text" id="subject" name="subject" value=" "/></h3>
					</label>			
	   			</td>
	   			<td align="right" width="400px">
	   				<fieldset>
	   					<legend align="left"> Templates </legend>
	   				<table width="100%">
	   					<tr>
	   						<td align="center">
			   					<div align="center" id="CB_templates">
						
								</div>
							</td>
							<td>				
								<input type = "button" value="Preview"  onclick="preview()" 	/><br/>
								<input type = "button" value=" Use " 	onclick="useTemplate()" /><br/>
							</td>
	   				  	</tr>
	   				</table>
	   				</fieldset>
				</td>
	   		</tr>
	   	</table>
		<table width = "100%">
			<tr>
				<td>					
					<label for = "maileditor">
						<h3>Body: </h3>
					</label>					
				</td>
				<td align = "center">
					<div id = "currentTemplate" ></div>
				</td>
				<td align="right" valign="bottom">
					<input type = "button" value = " save as "	onclick="saveAs()"/>
					<input type = "button" value = " Delete  "	onclick="DeleteTemplate()"/>
					<input type = "button" value = " Save  " 	onclick="saveTemplate()"/>
					<input type = "button" value = " New  " 	onclick="newTemplate()"/>
				</td>
			</tr>
			<tr>
				<td colspan="3">					
					<textarea id = "maileditor" name = "maileditor" rows = "10" cols = "80" ></textarea>		
					<input type = "submit" value = " send "/>						
				</td>				
			</tr>
		</table>
	</form>
  	<script language="JavaScript">	
  		
	/*
  	 * Initializating the mail editor
  	 * SETTING: the file browser to pdw file browser
  	 * 
  	 */
		var editor = CKEDITOR.replace( 'maileditor' , {
	 		filebrowserBrowseUrl : 'pdw_file_browser/index.php?editor=ckeditor',
            filebrowserImageBrowseUrl : 'pdw_file_browser/index.php?editor=ckeditor&filter=image',
            filebrowserFlashBrowseUrl : 'pdw_file_browser/index.php?editor=ckeditor&filter=flash',
            pasteFromWordRemoveFontStyles : false,
           }
		 );
		 
		 // THE CURRENT WORKING TEMPLATE IF SELECTED
		var currentTemplate = -1;
		
		function useTemplate(){
			var agree = confirm( "This will replace the current editor contants with the selected template,\nAre you sure?" );
			if (agree){			
				$.get('previewTemplate.php?id=' + $("#tempaltes").val() , function(data){
					var d = data.split("!@;-->");
					$("#subject").val(d[0].split("<!--")[1]);				
					editor.setData( d[1] );	
					currentTemplate = $("#tempaltes :selected").index()+1;					
					$("#currentTemplate").html("<h3>Currently Editing Template: '"+$("#tempaltes :selected").text()+"'</h3>");	
				});
			}
		}		
		function getTemplates(){
			$.post( "gettemplates.php" , function( data ) {
				$( "#CB_templates" ).html( data );				
			});
		}
 		function getInformation(){
	  		$.post( "MailingFunctions.php",
				$( "form" ).serialize(),	  			
	  			function(data){				
					$( "#Servants" ).html( data );
			 });
 		}
 		
 		function preview(){		
			previewWindow = window.open('previewTemplate.php?id='+$("#tempaltes").val(),'','width = 600,height = 500,left = 300,top = 100');
		}
		
		function saveAs(){	
			var name = prompt("Template Name:","templename");	
			if (name != null && name != "")	{
				$.post( "SaveTemplate.php" ,
						{"name":name,"subject":$("#subject").val(),"template":editor.getData()},	  			
			  			function( data ){	
			  				getTemplates();								
							alert(data);
				 });
			}
		}
		function saveTemplate(){	
			if( currentTemplate < 0){
				saveAs();
				return;
			}
			var name = prompt("Template Name:",$("#tempaltes :nth-child("+currentTemplate+")").text());
			if (name != null && name != "")	
			{
				$.post( "SaveTemplate.php" ,
						{"id":$("#tempaltes :nth-child("+currentTemplate+")").val(),"name":name,"subject":$("#subject").val(),"template":editor.getData()},	  			
			  			function( data ){	
			  				getTemplates();								
							alert(data);
				 });
			}
		}
		function newTemplate(){
			var agree = confirm( "This will replace the current editor contants with a blank template,\nAre you sure?" );
			if (agree){	
				editor.setData( "" );	
				$("#subject").val("");
				$("#currentTemplate").html("");
				currentTemplate = -1;
			}
		}

		function DeleteTemplate(){	
				
			var agree = confirm( "This will DETLET the '"+ $("#tempaltes :selected").text()+"' template,\nAre you sure?" );
			if (agree){			
				$.post('deleteTemplate.php' , {"id":$("#tempaltes").val()} , function(data){	
						getTemplates();				
						alert( data );					
				});
			}
		}

	$("document").ready(function(){ 

		/*
		 * Initializing the editor with a template
		 */
		/*$.get("templates/template1.html" ,function(data){					
				editor.setData(data);					
		});
		*/
		getTemplates();
			
	  	$("#weeklymeeting option:first").attr('selected','selected');  			
		$(".group").click(function(){ 
			getInformation(); 
			$("#checkall").attr('checked',this.checked);				
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