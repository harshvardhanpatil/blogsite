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
 	//require 'javascript/admin.js';
	$host="localhost";
 	$hostname = 'root';
	$host_pass = 'harshvardhan';
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

			//Clearing the database content
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
	<script  src="javascripts/admin.js"></script>
</head>
<body>

	
<input id = "logout_btn" type = "submit" value = "Logout" onclick = "demo()"/>
	
<br>

<input id = "manage_u" type = "submit" value = "Manage user" onclick = "buttonclick('admin/manageu.php')"/>


	
	
</body>
</html>