<?php
	function redirect_toa($new_location)
	{
		
		
		header("Location:".$new_location);
		exit;
	}  
	//require_once('included_functions.php');
	session_start();
	if(isset($_SESSION["username"])&&isset($_SESSION["Password"]))
	{
		//session_start();
		if($_SESSION["username"]=="harsh"&&$_SESSION["Password"]=="ggmu")
			{
			$Username=$_SESSION["username"];
			$Password=$_SESSION["Password"];

			//TODO:: Stop the destroy of session after refresh
			session_destroy();

			} 
		else
			{
			//session_destroy();	
			redirect_toa("login.php");

			}
	}
	else
	{
		redirect_toa("login.php");

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ML Admin</title>
</head>
<body>

	<?php
	
	require "included_functions.php";
	echo $Username;
	echo $Password;
	  ?>
	<?php
	$host="localhost";
	if(!@mysql_connect($host,"root","harshvardhan"))
	{
		die("cannot connect");
	}
	else 
	{
		
		if(@mysql_select_db("hglabs"))
		{


			$_query="select * from login";
			if($is_query_run=mysql_query($_query))
			{
				echo "<br>accesing table<br>";

				//printing data base
				while($_qexe=mysql_fetch_assoc($is_query_run))
				{
					echo "Username: ".$_qexe["username"]."   ";
					echo "Password: ".$_qexe["password"]."<br>";
				}	

			}
		}
		echo "<br>connected<br>";
	}
	?>


	<?php  
	//To connect data base and shift up when required




	?>

	

		
	
</body>
</html>