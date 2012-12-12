<html>
<head>
<title></title>
</head>
<body>

<?php
require_once('phpmail/lib/class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP
$name 	= "Wesam ";
$email 	 = "rashad.wesam@gmail.com";

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
  
  foreach($Results as $r)
  {
  	$name = $r["firstname"];
  	$email = $r["email"];
  	$fullname = $r["firstname"] . " " . $r["lastname"] ;
  	print_r($r);
	  $mail->Subject = "miss u {$name}";
	  $mail->AddAddress($email, $fullname );
	  $mail->MsgHTML(
	  		"Testing the Intelligent Automated Systems <br/><h2>hi {$name},</h2><br/> thanks for coming last week, <br/> also we can replaced by we missed you last time ... 
	  <br/>we were discussing with Dr. Samir 'The free well ' and it was very intersting discussion<br/>
	  next time March, 18 we will be disscusing the ..... with Dr. Hani Ashmalla.
	    ");//file_get_contents('contents.html'));
	
	  $mail->Send();
	  echo "Message Sent OK</p>\n";
	$mail->ClearAddresses();
  	$mail->ClearAttachments();

  }
  
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}
?>

</body>
</html>