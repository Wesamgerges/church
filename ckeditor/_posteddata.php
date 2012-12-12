<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
</head>
<body>
	
	<table border="0" cellspacing="0" id="outputSample">
		
		
<?php
$name = "Jimmy";
if ( isset( $_POST ) )
	$postArray = &$_POST ;			// 4.1.0 or later, use $_POST
else
	$postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS
print_r($postArray );
foreach ( $postArray as $sForm => $value )
{
	if ( get_magic_quotes_gpc() )
		$postedValue = htmlspecialchars( stripslashes( $value ) ) ;
	else
		$postedValue = htmlspecialchars( $value ) ;

	$postedValue = str_replace ("{name}",$name, $postedValue);	
?>
		<tr>
			
			<td><pre class="samples"><?php echo $postedValue?></pre></td>
		</tr>
	<?php
}
?>
	</table>
		
</body>
</html>
