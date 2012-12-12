<?php require_once 'include/Connection.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
</head>
 
  <body>
<?php
    $persons = new Connection();
    $persons ->Query("SELECT * FROM person,membermeeting WHERE person.id=membermeeting.MemberId AND membermeeting.meetingId = 2 ORDER BY MF,FirstName");   

?>
  	<h1 align="center"> Members Phone List </h1>
<h2 align="center">Boys then Girls</h2>
  	<br/>
  	<br/>
  	<a href="#girls"> To Girls </a> </br>
	<table class="attendanceTable" align="center" cellpadding="10px" width="800px" >
	    <tr class="attendanceHeader highLight" >
	    	<td > </td>
	        <td align="center" class='attendanceCell' >
	            Name
	        </td>
	        <td align="center" class='attendanceCell'>
	            Phone
	        </td>
	        <TD align="center" class='attendanceCell' >Emails</TD>
	   </tr>

<?php
$i=1;
foreach ($persons->Results as $person)
{
?>
 
                  

    <tr class='attendanceCell <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php ?>' >
    	<td class='attendanceCell'> [ ] </td>
        <td class='fn attendanceCell' >
        	<strong>
  <?php if ($person["FirstName"] == 'Almaz'  ){?> <a name="girls"></a> <?php }?>
           <?php echo $i-1;?> -
                   <?php echo $person["FirstName"] . " ".$person["LastName"]; 
                
?>
           </strong>
        </td>          
        <td class='attendanceCell'>
             <?php 
            	 echo  str_replace(",",",<br/>",$person["Phone"]);
             ?>
        </td>
       <td class='attendanceCell'>
             <?php 
            	 echo  str_replace(",",",<br/>",$person["Email"]);
             ?>
        </td>
   </tr>

<?php
}

?>
</table>

<br>

</body>
</html>