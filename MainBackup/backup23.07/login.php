<?php 

	require_once('included_functions.php');
	if(isset($_POST['submit'])){
		$username=$_POST["Username"];
		$Password=$_POST["Password"];
		//form was submitted
		//TODO access data base and check for authenticity
		if($username=="harsh"&&$Password=="ggmu")
		{
			session_start();
			$_SESSION["username"]=$username;
			$_SESSION["Password"]=$Password;

			redirect_to("admin.php");

		}
		else{
			$username=$_POST["Username"];
			$message="User name or Password not correct";

		}



	}
	else{
		$username="";
		$message="Please log in";

	}
 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="login.php" method="post">
	<fieldset>
	<legend><img src="res/admin.png" height="100" width="100"></legend>
		<?php echo $message."<br>";?>
		Username:<input type="text" name="Username" value=""><br>
		
		Password:<input type="Password" name="Password" value=""><br>
		<br>
		<input type="submit" name="submit" value="submit">
	
	</fieldset>
	</form>

	
</body>
</html>