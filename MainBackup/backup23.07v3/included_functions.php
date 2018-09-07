<?php 
	function redirect_to($new_location)
	{
		
		
		header("Location:".$new_location);
		exit();
	}  
	function logout($url) {
		session_start();
		$_SESSION = [];
		session_destroy();
		redirect_to("Location:".$url);
	}
?>