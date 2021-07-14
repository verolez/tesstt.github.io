<?php 
	
	session_start();
	// session_start();
	$_SESSION = array();
	// Destroy the session.
	session_destroy();
	 
	// Redirect to login page
	header("location: ../index.php");

 ?>