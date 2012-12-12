/**
 * @author Administrator
 */

$("document").ready(function(){   
                            //Starting();
    $("#AdminLoginForm").submit(function(){
    	GetLoginInfo(); 
    	return false;
    });
 });
   
function GetLoginInfo(){        
        $.post('GetLoginData.php',{UserName:$("#UserName").val() ,Password:$("#Password").val()},
        		 function(data) {
	            	$('#Message').html(data);
	          		$('#Message').delay(1000).fadeOut("slow",function(){
                                                     $('#Message').html("<br/>");
                                                     $('#Message').show()});
	            if(data.search(/success/i)>0){	            		            	                   
	               Exiting(1000, function(){
	               		$("#WelcomeMessage").html("<a href='javascript:logOut();' id='loginlink'>Log Out</a> "+data); 
	            		$(".TopMessage").removeClass("TopMessage success");
	            		window.location = "mainPage.php";
	               });
   	            	
	            }                 
    });   
}
function logOut()
{
	$.post("logout.php");
	//window.location = "logIn.php";	
	//$("#WelcomeMessage").html("<a href='javascript:Starting();' id='loginlink'>login</a> ");   
}
 function Exiting(c,f) {
         $('#LoginWindow').delay(c).hide('slow',
         	function(){
                    $("#UserName").val("");
                    $("#Password").val("");
                    f();
            });
 }
 function Starting()
 {
     $('#UserName').val(" ");     
     $('#Password').css("color","white");
     $('#Password').val(" ");    
     
     $('#LoginWindow').toggle('slow',
     				function(){ ;         
                           $("#UserName").val(""); 
                            $("#Password").val("");
                            $('#Password').css("color","black");
                     });
                  $('#UserName').focus();
 }
 
 
