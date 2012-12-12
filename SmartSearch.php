<form action="GetSearchResults.php" method="post" id="SearchForm" name="SearchForm">
<input id="search" name="search">
    <input type="button" value="  Search " id="searchbtn" name="searchbtn">
</form>
<br>

<div id="message"></div>

<script language="javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script language="javascript">
 
$("document").ready(function(){         
    $("#searchbtn").click(function()
    {
          $.post('GetSearchResults.php', $("#SearchForm").serialize(),  
          function(data) {              
          $('#message').html(data).hide().slideDown(500);            
           }); 
      

    })
});
    
</script>