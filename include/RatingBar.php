<?php /*
  <!--- 
	#66FF66 Yellow
	#FFFF66 Green
	#FF6666 RED
	#EEE	gray
	(%)
	if(<40)RED
	if(40-70) Yellow
	if(>70) Green
	2	1
	4	2
	6	3
	8	4
	10	5
	
	for ( i=0 to i < round(%/10)/2 i++) set the color as choosed above
	for (i -> 5 i++) set the color to gray
  -->
  */?>
 
<?php 
	define ("RED","#FF6666 ");
	define ("YELLOW","#FFFF66");
	define ("GREEN","#66FF66");
	define ("GRAY","#AAA");
	
	function BuildRating($percent, $size = 30)
	{
	?>
	<div>
  <table height="<?php echo $size?>px" width="<?php echo $size?>px" cellpadding=0 >
	<tr>
	
	<?php
		if($percent < 40)
			$Color = RED;
		if($percent > 40 && $percent < 70)
			$Color = YELLOW;
		if($percent > 70)
			$Color = GREEN;
		
		$NoRows = round($percent/10)/2;
		for ( $i = 0 ; $i < 5 ; $i++)
		{
			if ( $i >= $NoRows ) $Color = GRAY;
		?>
		<td valign="bottom">
			<div id="visualization" style="width: 100%; height: <?php echo 20*($i+1)?>%;background-color: <?php echo $Color?> ; border: 1px  #ffffff" ></div>
		</td>
		<?php		
		}		
		?>
		</tr>
	  </table>
	</div>
<?php
	}	
?>

 