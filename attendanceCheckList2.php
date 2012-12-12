<?php require_once 'include/Connection.php';?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
<link href="include/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
</head>
 
  <body>
<?php
    $persons = new Connection();
    $persons ->Query("SELECT * FROM person ORDER BY FirstName");   

?>
  	<h1 align="center"> Attendance </h1>
  	<br/>
  	<br/>
  	
	<table class="attendanceTable" align="center" cellpadding="10px" width="800px" >
	    <tr class="attendanceHeader highLight" >
	    	<td > </td>
	        <td align="center" class='attendanceCell' >
	            Name
	        </td>
	        <td align="center" class='attendanceCell'>
	            Email
	        </td>
	        <TD align="center" class='attendanceCell' >Notes</TD>
	   </tr>

<?php
$i=1;
foreach ($persons->Results as $person)
{
?>
    <tr class='attendanceCell <?php if(($i++)%2 == 0)echo " highLight"; ?>' id='<?php ?>' >
    	<td class='attendanceCell'>  </td>
        <td class='fn attendanceCell' >
        	<strong>
           <?php echo $i-1;?> - <?php echo $person["FirstName"] . " ".$person["LastName"]; ?>
           </strong>
        </td>          
        <td class='attendanceCell'>
             <?php 
            	 echo  str_replace(",",",<br/>",$person["Email"]);
             ?>
        </td>
        <td width="245px" class='attendanceCell' > </td>
   </tr>

<?php
}

?>
</table>

<br>

</body>
</html>
