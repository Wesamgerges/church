<?php require_once 'include/Connection.php';?>
		  <?php  $templates = new Connection();
   				 $templates ->Query("
			    						SELECT * FROM ".TEMPLATE_TBL." 
			    						" ."
			    				   ");
	   ?>
 
	<select size="5" id="tempaltes" style="width : 200px">
		<?php foreach ($templates->Results as $template){?>
		<option value="<?php echo $template["id"]?>"><?php echo $template["name"]?></option>
		<?php }?>
	</select>
