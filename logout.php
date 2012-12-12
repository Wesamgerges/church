<?php require_once("include/session.php"); ?>
<?php
		// Four steps to closing a session
		// (i.e. logging out)

		// 1. Find the session
		//session_start();
		$_SESSION['user_id'] = "";
		unset($_SESSION['user_id']);
		// 2. Unset all the session variables
		$_SESSION = array();
		
		// 3. Destroy the session cookie
		if(isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		
		// 4. Destroy the session
		session_destroy();
		//echo "this is log out ".$_SESSION['user_id'];
		redirect_to("logIn.php");		
?>