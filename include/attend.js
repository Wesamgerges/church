/**
 * @author Administrator
 */

function attend(m){
	//alert("attended "+$("#MeetingId").val());return;
	
	$.post('saveMemberAttend.php', {weeklyMeetingId:currentMeetingId,MemberId:m,MeetingId:$("#MeetingId").val()},
	  	    function(data) { 
	  	    	$("#m"+m).addClass("attended");
	  	    	$("#searchWord").val("");
	  	    	$("#searchWord").focus();
	  	    	//alert(data);
	    	//$('#message').html(data);   
	   		//$("#"+currentIndex).addClass("highLight");                   
		});
		    
}
function attendFamily(f){
	//alert("attended"+$("#MeetingId").val());
	$.post('saveFamilyAttendance.php', {weeklyMeetingId:currentMeetingId,FamilyId:f,MeetingId:$("#MeetingId").val()},
	  	    function(data) { 
	  	    	$(".personAttend").addClass("attended");
	  	    	$("#searchWord").val("");
	  	    	$("#searchWord").focus();
	    	//$('#message').html(data);   
	   		//$("#"+currentIndex).addClass("highLight");                   
		});
		    
}