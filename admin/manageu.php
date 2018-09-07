<?php

	session_start();
	setcookie("uname","",time()+(30*1),"/");
	function redirect_toa($new_location)
	{
		$_SESSION = [];
		session_destroy();

		header("Location:".$new_location);
		exit;
	}
 ?>
 <?php
 	require '../databaseAccess.php';
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
			redirect_toa("../login.php");

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
				//$_SESSION=[];

				} 
			else
				{	
					redirect_toa("../login.php");

				}
		
		
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" >
	<title>Manage User</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

	
</head>
<body>
	<div class="row">

	<div class="col-lg-12 col-xs-12 bg-danger text-center"><h1>Manage user</h1></div>
	</div>

	
	<a href="../logout.php"><button class="col-lg-12 col-xs-12 bg-success">Logout</button></a>

	<?php
	@mysql_connect($host,$hostname,$host_pass);
	display("hglabs");  
	?>
	<p id = 'username'></p>
	<p id='password'> </p>
	<div class="row">
<input class="col-lg-6 col-xs-12 bg-success" id = "create_btn" type = "submit" value = "Create User" onclick = "createbtn()"/>


<input class="col-lg-6 col-xs-12 bg-success" id = "delete_btn" type = "submit" value = "Delete User" onclick = "deletebtn()"/>

</div>




<br>
<br>
<br>


	<script  src="../javascripts/manageu.js"></script>
	<script  src="../javascripts/admin.js"></script>
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>