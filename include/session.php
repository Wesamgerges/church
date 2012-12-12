<?php
	session_start();
	
	function logged_in() {
		return isset($_SESSION['user_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
//			header("Location: {$location}");
//            echo "reditected {$location}";
    echo "<script language='javascript'>";
    echo "window.location ='".$location."'";
    echo "</script>";

			exit;
		}
	}
?>
