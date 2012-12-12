<?php
    $N = (int)$_POST["NoPersons"];
?>

<div id="person<?php echo $N; ?>">
	<table>
	<tr>
		<td class="Formlabel" width="50px">(<?php echo $N-2; ?>) </td>
		<td> <input class="Formtxtbox" id="FirstName<?php echo $N; ?>" name="FirstName<?php echo $N; ?>" value="" > </td>
		<td> <input class="Formtxtbox" id="LastName<?php echo $N; ?>" name="LastName<?php echo $N; ?>" value=""> </td>				
		<td> <input class="Formtxtbox" id="Phone<?php echo $N; ?>" 	name="Phone<?php echo $N; ?>" size='10' value=""> 	</td>				
		<td> <input class="Formtxtbox" id="DOF<?php echo $N; ?>" name="DOF<?php echo $N; ?>" size='10' value=""> 	</td>				
		<td> <input class="Formtxtbox" id="Email<?php echo $N; ?>" name="Email<?php echo $N; ?>" value=""> 	</td>				
		<td class="status1">  </td>	
		<td><input type="button" class="ff" value=" Registered"/></td>			
	</tr> 
	<tr>
		<td></td>
		<td class="Formlabel"> FirstName </td>
		<td class="Formlabel"> LastName  </td>
		<td class="Formlabel"> Cell Phone  	 </td>
		<td class="Formlabel"> DOF	  	  </td>
		<td class="Formlabel"> Email	 </td>
		<td class="Formlabel"> Status	 </td>
		<td></td>
	</tr>   
   </table>
   <br/>
</div>
