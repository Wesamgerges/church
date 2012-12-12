<?php require_once 'include/Connection.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
<script language="javascript" src="<?php echo JQueryLink; ?>"></script>


<style type="text/css">
	.element	{ position:fixed; top:0; left:0; padding:10px; font-family:Arial; background:#EEF;z-index: 2;  }
	.element2	{ position:fixed; top:0; right:0; padding:10px; font-family:Arial; background:#EEF;z-index: 2;  }
	.select {background:#4EEF07; font-weight: bold;}
	.rounded {-moz-border-radius: 15px;
				border-radius: 15px;
				border:1 solid #EEE;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 24px;
				padding: 15px;
			}
	</style>
</head>
 
  <body>
<?php
    $persons = new Connection();
    $persons ->Query("SELECT * 
    					FROM ".PersonsTable.",".MemberMeetingTable." 
    					WHERE ".PersonsTable.".id = ".MemberMeetingTable.".MemberId AND ".
    					MemberMeetingTable.".meetingId = 2 ORDER BY FirstName");   

?>
  	<br/>
  	<div class="element" style="width: 30px;height: 100%;" align="center">
  		<table>
  			<?php 
  				for($i = 0; $i < 26; $i++){
  			?>
  			<tr>
  				<td>
  					<a href="#<?php echo chr($i+65);?>"> <?php echo chr($i+65);?> </a>
  				</td>
  			</tr>
  			<?php }?>
  		</table>
  	</div>
  	
  	<div class="element2" style="width: 250px;height: 95%;overflow: auto">
  		
  	</div>


	<table align="center" cellpadding="3px" width="600px" >
	

<?php
	$i = 1;
	$CharacterAnchor = "A"; 
foreach ($persons->Results as $person)
{
	if($CharacterAnchor != $person["FirstName"][0] )
		$CharacterAnchor = $person["FirstName"][0];
?>
    <tr  >
    	
        <td >
        	<div class='anchor rounded <?php if(($i++)%2 == 0)echo " highLight"; ?>'  align="center" id = "<?php echo $person[0]; ?>">
           <a  name="<?php echo $CharacterAnchor; ?>" > 
           		<?php echo $person["FirstName"] . " ".$person["LastName"]; ?>
           </a>
           </div>
           
        </td>          
   </tr>
	<?php
	}	
	?>
	</table>
<br/>
<br/>
<br/>
<br/>
<div align="center">
<input type="button" value=" Save Attandance " align="center" id="SaveAttendance"/>
</div>
<br/>
<br/>
<script>
var aa = [];
var i=0;
var ht = "";
var count = 0;

	$("document").ready(function(){
		$(".anchor").click(function(){
			//alert($(this).find("a").attr("id"));
			$(this).toggleClass("select");
			ht = "";
			count = 0;
			$(".select").each(function(index,dom){
				count++;
				ht += $(this).find("a").text()+"<br/>";
			});
			
			$(".element2").html("<div align = 'center'>"+count + "</div>"+ht);
		});
		
		$("#SaveAttendance").click(function(){
			
			$(".select").each(function(index,dom){
				aa[i++] = $(this).attr("id");
				
			});
			
			$.post("SaveAttendance.php",{dd:aa},function (d){
				//alert(d);
			});
			//alert(aa);
		});
	});
</script>
</body>
</html>
