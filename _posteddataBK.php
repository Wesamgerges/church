<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require_once('phpmail/lib/class.phpmailer.php');?>
<?php require_once 'include/Connection.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
</head>
<body>
	
	<table border="0" cellspacing="0" id="outputSample">
		
		
<?php
    $AttendedPersons = new Connection();
    $AttendedPersons ->Query
    ("SELECT * FROM ".ServantsTable. " , ". PersonsTable ." WHERE ".ServantsTable.".Memberid = ".PersonsTable.".id AND meetingId = 2 
    
    ");
print_r($AttendedPersons -> Results);
/*
$Results = array (
		array(
			"firstname"=> "GWesam",
			"lastname"=> "Gerges",
			"email"=>"rashad.wesam@gmail.com"
		     ),
		array(
			"firstname"=> "HWesam",
			"lastname"=> "Gerges",
			"email"=>"wesam_rashad@hotmail.com"
		     )
		     
		);
*/
if ( isset( $_POST ) )
	$postArray = &$_POST ;			// 4.1.0 or later, use $_POST
else
	$postArray = &$HTTP_POST_VARS ;	// prior to 4.1.0, use HTTP_POST_VARS

foreach ( $postArray as $sForm => $value )
{

	//if ( get_magic_quotes_gpc() )
		//$postedValue = htmlspecialchars( stripslashes( $value ) ) ;
	//else
		$postedValue = //htmlspecialchars
		//str_replace( "\\\"","'",$value ) 
		stripslashes ($value)	;
}

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP
//$name 	= "Wesam ";
//$email 	 = "rashad.wesam@gmail.com";


try {
  $mail->Host       = "www.copticchurch.org"; // SMTP server
  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
  $mail->Port       = 465;                   // set the SMTP port for the GMAIL server
  $mail->Username   = "familyoflife@copticchurch.org";  // GMAIL username
  $mail->Password   = "Family4life";            // GMAIL password
  
  
  $mail->SetFrom('familyoflife@copticchurch.org', 'Family Of Life');
  
  
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  foreach($AttendedPersons -> Results as $r)
  {
  	$name = $r["FirstName"];
  	$email = $r["Email"];
  	echo $email."<br/>";
  	if($email == "") continue;
  	$emails = explode(",",$email);
  	
  	$fullname = $r["firstname"] . " " . $r["lastname"] ;
  	//print_r($r);
	  $mail->Subject = "[Tested] miss u ". $name;
	  foreach($emails as $e)
	  {
	  	$mail->AddAddress($e, $fullname );
	  }
	   	
	  $postedValue1 = str_replace ("{name}",$name, $postedValue);
	  echo $postedValue1 ;
	  $mail->MsgHTML($postedValue1 );
	
	  /*
	  		"Testing the Intelligent Automated Systems <br/><h2>hi {$name},</h2><br/> thanks for coming last week, <br/> also we can replaced by we missed you last time ... 
	  <br/>we were discussing with Dr. Samir 'The free well ' and it was very intersting discussion<br/>
	  next time March, 18 we will be disscusing the ..... with Dr. Hani Ashmalla.
	    "
	    *///file_get_contents('contents.html'));
	
	  //$mail->Send();
	  echo "Message Sent OK</p>\n";
	$name = "";
  	$email ="";
  	$emails = "";
  	$fullname = "";
	$mail->ClearAddresses();
  	$mail->ClearAttachments();

  }
  
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
		
?>
		

	</table>
	<?php
		echo "<br/>Done.<br/>";
	?>	
</body>
</html>