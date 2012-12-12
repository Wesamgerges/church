/**
 * @author Wesam Gerges
 */

 var currentIndex = 1;

  $("document").ready(function(){
  		$("#searchWord").focus();
		$("#searchWord").click(function(){
			if($("#searchWord").val()!=""){
				$('#message').show();
			}
				});  	

$("#searchWord").focus(function(){
	if($("#searchWord").val()!="")
	{
		$('#message').show(1,
			function(){$("#searchWord").select();	
			});			
	}
});


  $("#searchWord").keydown(function(e){  		
  	switch(e.keyCode) { 
         // User pressed "up" arrow
         case 38:
         	if(--currentIndex<1)currentIndex = $("li").size() ;
            $("li").removeClass("highLight");
            $("#"+currentIndex).addClass("highLight");
            event.preventDefault();
          
         break;
         // User pressed "down" arrow
         case 40:
         if($("#message").is(":hidden") == true){
         	$('#message').show();
         }
         if(++currentIndex>$("li").size()){
         	currentIndex = 1;
         }
         $("li").removeClass("highLight");
         $("#"+currentIndex).addClass("highLight");         
          event.preventDefault();
         break;
         // User pressed "enter"
         case 13:
         	 event.preventDefault();
         	 $("#"+currentIndex).click();
         	//getSelectedItem($("#"+currentIndex).val());        
           
         break;
      }
    });
    
  	$("#searchWord").keyup(function(e){
  	  if(e.keyCode==13 || e.keyCode==38 || e.keyCode==40)return;
	  if($("#searchWord").val()==""){
  		$('#message').hide();
  		return;
  	}		
  		$.post('getgsResults.php',{searchWord:$("#searchWord").val(),MeetingId:$("#MeetingId").val()},  
                function(data) { 
                	$('#message').html(data);   
               		$("#"+currentIndex).addClass("highLight"); 
           			if($("#message").is(":hidden") == true){
         				$('#message').show();	
         			}                  
         		});  
	  	 
     
  		});
  });
  
  function getSelectedItem(m,f) {
  	$("#searchWord").val($("#"+currentIndex).text());
  	$('#message').hide();
  	
    $.post('SetAttendance.php', {MemberId:m,FamilyId:f,cMeetingId:currentMeetingId},  
	    function(data) { 	        
	    	$('#detailedMessage').html(data).hide().fadeIn(500); 	         
	    }); 
  }
      	
   	function setSelectItem(s){
   		
   		currentIndex = parseInt(s);
   		
   		$("#detailedMessage2").html(s);
   		$("li").removeClass("highLight");
   		$("#"+s).addClass("highLight");
   	}