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
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

	<title>Admin panel</title>
	
	

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



	<script  src="javascripts/admin.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 bg-warning text-center"><h1>Admin panel</h1></div>
		</div>
		
		<div class="row">
			<button class="col-lg-6 col-xs-12 bg-success" id = "logout_btn" onclick = "demo()">Logout :<?php echo $_SESSION["username"]; ?></button>
			<button class="col-lg-6 col-xs-12 bg-success" id = "manage_u"  onclick = "buttonclick('admin/manageu.php')">Manage Users</button>
			<button class="col-lg-6 col-xs-12 bg-success" id="manage_post" onclick="">Manage posts</button>     <!--TODO-->
			<button class="col-lg-6 col-xs-12 bg-success" ig="see_prog" onclick="">Progress</button>
		</div>	
	</div>


	<!--old code
	<input id = "logout_btn" type = "submit" value = "Logout" onclick = "demo()"/>
	<br>
	<input id = "manage_u" type = "submit" value = "Manage user" onclick = "buttonclick('admin/manageu.php')"/>
	-->



	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js" ></script>
	
	
</body>
</html>