<?php

	session_start();
	function redirect_toa($new_location)
	{
		$_SESSION = [];
		session_destroy();

		header("Location:".$new_location);
		exit;
	}
 ?>
 <?php
 	require 'databaseAccess.php';
	$host="localhost";
 	$hostname = 'root';
	$host_pass = 'wxyz';

	if(!$db = @mysql_connect($host,$hostname,$host_pass))
	{
		die("cannot connect");
	}
	else 
	{
		
		if(isset($_SESSION["username"])&&isset($_SESSION["Password"]))
		{
			
				$_qexe = dataBase('hglabs',$_SESSION["username"]);
				validateUser();
		}
		
		else
		{
			redirect_toa("login.php");

		}
		mysql_close($db);
	}
	?>

<?php  
	//require_once('included_functions.php');
	function validateUser()
	{
		global $_qexe;
			if($_SESSION["Password"]== $_qexe['password'])
				{

			//TODO:: Stop the destroy of session after refresh
				$_SESSION = [];
				$_qexe= [];

				} 
			else
				{	
					redirect_toa("login.php");

				}
		
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ML Admin Login In Page</title>
</head>
<body>

	


		
	
</body>
</html>