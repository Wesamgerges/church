<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require_once('phpmail/lib/class.phpmailer.php');?>
<?php require_once 'include/Connection.php';?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> </title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	
</head>
<body>
   		
<?php
	//print_r($AttendedPersons -> Results);
	$MailingList = array();
	if(isset($_POST[ "members" ])){
	   $Members = $_POST[ "members" ];
	   foreach( $Members as $m ){		
			$mm = ( explode( ";#" , $m ) );	
			$MailingList[] = array(
									"ID"		 => $mm[ 0 ] , 
									"FirstName"  => $mm[ 1 ] ,
									"LastName" 	 => $mm[ 2 ] , 
									"Email" 	 => $mm[3]
									);	
	    }
	}
/*NEW BLOCK*/
		$moreList = $_POST[ "moreList" ];
		if( $moreList != ""){
		$mLists =  explode( "," , $moreList ) ;	
			foreach( $mLists as $ms ){
				$mms = explode( ":" , $ms ) ;
				$mmsn = explode( " " , str_replace("  "," ",ltrim ($mms[0])) ) ;
				$MailingList[] = array(
										"ID"		 =>  0 , 
										"FirstName"  => $mmsn[ 0 ] ,
										"LastName" 	 => $mmsn[ 1 ] , 
										"Email" 	 => $mms[1]
										);	
			}
		}
/************/
//print_r($MailingList);
    if ( get_magic_quotes_gpc() ){
		$postedValue = ( stripslashes( $_POST["maileditor"] ) ) ;
		$Subject = stripslashes($_POST["subject"]) ;
	}
    else{
		$postedValue = 	( $_POST["maileditor"] )	;
		$Subject = ($_POST["subject"]) ;
	}
	
  $mail = new PHPMailer( true ); // the true par$_POST[am means it will throw exceptions on errors, which we need to catch

  $mail->IsSMTP(); 			       // telling the class to use SMTP
  $mail->Host       = "www.copticchurch.org";  // SMTP server
  $mail->SMTPDebug  = 2;                      // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                   // enable SMTP authentication
  $mail->SMTPSecure = "ssl";                  // sets the prefix to the servier
  $mail->Host       = "smtp.gmail.com";       // sets GMAIL as the SMTP server
  $mail->Port       = 465;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "familyoflife@copticchurch.org";  // GMAIL username
  $mail->Password   = "Family4life";            // GMAIL password    
  $mail->SetFrom('familyoflife@copticchurch.org', 'Family Of Life');
  $mail->CharSet = 'UTF-8';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically

/*** SEND EMAILS AS CC ***/
	if (isset($_POST["CC"])){
		//echo $_POST["CC"];
	foreach($MailingList as $r)
	{
	  $email = $r["Email"];	  	
		
	    $fullname = $r["FirstName"] . " " . $r["LastName"] ;	
	  	if($email == "") continue;  	
	  	$emails = explode(",",$email);print_r($emails );
		
	  	foreach($emails as $e)
		{
			echo $e."<br/>";
		  	$mail->AddAddress($e, $fullname );
		}
	}
	     try {
			  $mail->Subject = $Subject;
			  echo "subject: " . $mail->Subject ;
	
			  $mail->MsgHTML($postedValue );
			///file_get_contents('contents.html'));// you can use it as a template
			
			 $mail->Send();
			  echo "<p>Message Sent OK</p>\n";
			  	  	
	  } catch (phpmailerException $e) {
	  	echo $e->errorMessage(); //Pretty error messages from PHPMailer
	  } catch (Exception $e) {
	 	 echo $e->getMessage(); //Boring error messages from anything else!	
	  }
  }
  /****************************************/
else{
  foreach($MailingList as $r)
  {
    try {
	  	$name = $r["FirstName"];
	  	$email = $r["Email"];
	  	
	  	echo $email."<br/>";
	  	
	  	if($email == "") continue;
	  	
	  	$emails = explode(",",$email);  	
	  	$fullname = $r["FirstName"] . " " . $r["LastName"] ;
	  	//print_r($r);
		  $mail->Subject = str_replace ( "{name}" , $name , $Subject);
		  echo "subject: " . $mail->Subject ;
		  foreach($emails as $e)
		  {
		  	$mail->AddAddress($e, $fullname );
		  }
		   	
		  $postedValue1 = str_ireplace ( "{name}" , $name , $postedValue );
		  $postedValue1 = str_ireplace ( "&quot;" , "" , $postedValue1 );
		  //echo $postedValue1 ;
		  $mail->MsgHTML($postedValue1 );
		///file_get_contents('contents.html'));// you can use it as a template
		echo $postedValue1 ;
		 $mail->Send();
		
		  echo "<p>Message Sent OK</p>\n";
		  
		$mail->ClearAddresses();
	  	$mail->ClearAttachments();
	  	sleep(3);
	  	
  } catch (phpmailerException $e) {
  	echo $e->errorMessage(); //Pretty error messages from PHPMailer
  } catch (Exception $e) {
 	 echo $e->getMessage(); //Boring error messages from anything else!	
  }

}
}
  		
?>
	<?php
		echo "<br/><h2>Done.</h2><br/>";
	?>	
</body>
</html>