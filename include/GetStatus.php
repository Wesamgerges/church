<?php require_once 'Connection.php';?>
<?php function creatStatus($id){?>
<select id="Status<?php echo $id?>" name="Status<?php echo $id?>">
<?php
	$getStatus = new Connection();
	$getStatus->Query("SELECT * FROM status");
	foreach ($getStatus->Results as $status){    
?>
	<option value="<?php echo $status["ID"]?>"><?php echo $status["Status"]?> </option>
<?php }?>	
</select>
<?php }?>