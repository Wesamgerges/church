/**
 * @author Administrator
 */

/**
 * @author Administrator
 */

 var currentIndex = 1;

  $("document").ready(function(){
  	$("#searchWord").select();
		$("#searchWord").click(function(){
			if($("#searchWord").val()!=""){
				$('#message').show();				
			}
			$("#message").addClass("outterSearchResult");			
	});  	

$("#searchWord").focus(function(){
	if($("#searchWord").val()!=""){
		$('#message').show();
	}
});

$("#searchWord").blur(function(){
	if($("#searchWord").val()!="")	{
		$('#message').fadeOut(300);
	}
});

	$("#searchWord").change(function(){
					
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
          event.preventDefault();
         if($("#message").is(":hidden") == true){
         	$('#message').show();
         }
         if(++currentIndex>$("li").size()){
         	currentIndex = 1;
         }
         $("li").removeClass("highLight");
         $("#"+currentIndex).addClass("highLight");         
         $('#detailedMessage2').html(currentIndex);
         break;
         // User pressed "enter"
         case 13:
         	event.preventDefault();
         	getSelectedItem($("#"+currentIndex).val());        
           
         break;
      }
    });
    
  	$("#searchWord").keyup(function(e){
  	  if(e.keyCode==13 || e.keyCode==38 || e.keyCode==40)return;
	  if($("#searchWord").val()==""){
  		$('#message').hide();
  		return;
  	}		
   		$.post('getEasySearchResults.php', {searchWord:$("#searchWord").val()},  
                function(data) { 
                	var newdata = data.split("-=+");
                	$('#message').html(newdata[1]).fadeIn(300); 
                	
                	$('#detailedMessage').html(newdata[0]).fadeIn(300); 
                	  currentIndex = 1; 
               		$("#"+currentIndex).addClass("highLight");
					/*if($("#message").is(":hidden") == true){
							$('#message').show();
					}*/					
         		});
		
				
  		});
  });
  
  function getSelectedItem(m,f) {
  	$("#searchWord").val($("#"+currentIndex).text().split("  ",2)[1]);
  	$('#message').hide();
 
 		$.post('getMemberInfoById.php', {MemberId:m},  
                function(data) { 
                	$('#detailedMessage').html(data).fadeIn(300); 
                	 
               		$("#"+currentIndex).addClass("highLight");                   
         		});      		       
  }
      	
   	function setSelectItem(s){   		
   		currentIndex = parseInt(s);   		
   		$("#detailedMessage2").html(s);
   		$("li").removeClass("highLight");
   		$("#"+s).addClass("highLight");
   	}
   	
