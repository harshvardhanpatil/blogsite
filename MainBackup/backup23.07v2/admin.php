
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
	$host="localhost";
 	$hostname = 'root';
	$host_pass = 'wxyz';

	if(!@mysql_connect($host,$hostname,$host_pass))
	{
		die("cannot connect");
	}
	else 
	{
		
		if(isset($_SESSION["username"])&&isset($_SESSION["Password"]))
		{
		
			if(@mysql_select_db("hglabs"))
			{


				$_query="select * from login where username = '" . $_SESSION['username']."'";
				$_result = mysql_query($_query);
				$_qexe = mysql_fetch_array($_result);

			//Display the Row Details
 				echo '<pre>';
			 	print_r($_qexe); 
			 	echo '</pre>';
			 	validateUser();
			
			echo "<br>connected to DB<br>";
			}
			else{
				echo 'DataBase not connected';
			}
		}
		
		else
		{
			redirect_toa("login.php");

		}
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

	<?php
	
	require "included_functions.php";
	  ?>
	


		
	
</body>
</html>