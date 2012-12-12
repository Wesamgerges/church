<?php
/**
 * Created:
 * By: Wesam Gerges
 * Date: January 12 2012
 * Last Update: April 18 2012
 * 
 * The base configurations.
 * 
 */
	// TABLE NAMES	
	
	define ("AttendanceTable",		"meetingattendance" 							);
	define ("ServantsTable",		"mservants"										);
	define ("PersonsTable",			"person"										);
	define ("MemberMeetingTable",	"membermeeting"									);
	define ("TEMPLATE_TBL", 		"templates"										);
	define ("Pages", 				"pages"											);
	
	// Page	
	define ("MainPage", 			"NewMainPage.php"								);
	define ("AddFamilyPage",		"AddFamily.php"									);
	define ("SendEMailPage",		"SendEMail.php"									);
			
	// Email Account Information
	define ("MailHost  ",			"smtp.gmail.com"								);
	define ("MailSMTPSecure" ,		"ssl"											);
	define ("MailUsername", 		"familyoflife@copticchurch.org"					);
	define ("MailPassword",			"Family4life"									);

	// JQuery Path	
	define ("JQueryPath",			"https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js");
	
	// Main CSS file path
	define ("MainCSS",				"include/stylesheet.css"						);	

?>