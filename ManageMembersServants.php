<?php require_once 'include/functions.php';?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title>Manage Members Servants</title>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
</head>
  <body>

<div align="center">
<form id="info" name="info" action="" method="post">
<?php
	getAllMeetings();
?>
<br/>
<br/>
<div class="demo">

<input type="checkbox" name="type" value="servant" checked="checked" /> servant
<input type="checkbox" name="type" value="member" /> member
<br/>
<a href="#" class="alphbet" id="A">A</a> 
<a href="#" class="alphbet">B</a>
<a href="#" class="alphbet">C</a>
<a href="#" class="alphbet">D</a>
<a href="#" class="alphbet">E</a>
<a href="#" class="alphbet">F</a>
<a href="#" class="alphbet">G</a>
<a href="#" class="alphbet">H</a>
<a href="#" class="alphbet">I</a>
<a href="#" class="alphbet">J</a>
<a href="#" class="alphbet">K</a>
<a href="#" class="alphbet">L</a>
<a href="#" class="alphbet">M</a>
<a href="#" class="alphbet">N</a>
<a href="#" class="alphbet">O</a>
<a href="#" class="alphbet">P</a>
<a href="#" class="alphbet">Q</a>
<a href="#" class="alphbet">R</a>
<a href="#" class="alphbet">S</a>
<a href="#" class="alphbet">T</a>
<a href="#" class="alphbet">U</a>
<a href="#" class="alphbet">V</a>
<a href="#" class="alphbet">W</a>
<a href="#" class="alphbet">X</a>
<a href="#" class="alphbet">Y</a>
<a href="#" class="alphbet">Z</a>
<br/>

<input id="searchWord" name="searchWord" autocomplete="off"/>
<br/>

<table width="60%" cellpadding="10">
	<tr>
		<td width="55%">
			<div class="listAllMembers">
				<div id="listAll">
				</div>
				
			</div>
		</td>
		<td>
			<div id="addList" class="listAllMembers">
				
			</div>
		</td>
	</tr>
	
</table>
<input type="hidden" id="currentMeetingId" name="currentMeetingId" />
</div>

<div id="floating" class="floating">
	<table width="100%">
		<tr>
			<td width="100%" align="right"><input type="button" value="  X  " id="closeMemberDetail"/><br /></td>
		</tr>
		<tr>
			<td>
				<div id="MemberInfo">
					Member Information
					
				</div>
				
			</td>
		</tr>
	</table>
		
</div>
</form>
</div>
</body>
</html>

<script language="JavaScript">
	$("document").ready(function(){	
		$("#Meetings").change(function(){loadServants();});
		$("#floating").hide();
		$("#closeMemberDetail").click(function(){
			$("#floating").hide(1000);
		});	
		
		$.post('getMembers.php', {"searchWord":"A"},  
	    function(data) {
	    	$("#listAll").html(data).hide().fadeIn(1000);	    	      
	    }); 

	$(".alphbet").click(function(){		
		$.post('getMembers.php', {"searchWord":$(this).text()},  
	    function(data) {
	    	$("#listAll").html(data).hide().fadeIn(1000);
	    	//$("#searchWord").val($(this).text());	    	    
	    }); 
	});	
		loadServants();
});	
	
	function loadServants()
	{
		$.post("loadServants.php",{MeetingId:$("#Meetings").val()},function(data){			
			$("#addList").html(data).hide().fadeIn(1000);
		});
	}
	
	function Open(id){
		$("#floating").show(1000);
		
		$.post("getMember.php",{id:id},function(data){	
			$("#MemberInfo").html(data)	;	
			//$("#addList").html(data).hide().fadeIn(1000);
		});
		
	}
	function removeMember(id,firstName,lastName){
		if(confirm("Are you sure you will remove "+firstName+" "+lastName+" from servants list?"))
			alert("yes");
		else
			alert("NO");
	}
</script>

<script language="JavaScript">
	$("document").ready(function(){
		
	$("#searchWord").keyup(function(e){
  	  if(e.keyCode==13 || e.keyCode==38 || e.keyCode==40)
  	  {
  	  	e.preventDefault();
  	  	return;
  	  }
  	  
  	  var searchWord ="";
  	  
	  if($("#searchWord").val()=="")
  		searchWord  = "A" ;
  	 else 
  		searchWord  = $("#searchWord").val();

  		$.post('getMembers.php', {"searchWord":searchWord },  
	    function(data) {
	    	$("#listAll").html(data).hide().fadeIn(1000);	    		  
	    	}); 
 	    });
	});
	

 	 function addServant(id)
 	 {
 	 	$.post('addServant.php', {MeetingId:$("#Meetings").val(),"Memberid":id},  
	    	function(data) {
				loadServants();    		       
	    }); 	
 	 }
</script>		
 