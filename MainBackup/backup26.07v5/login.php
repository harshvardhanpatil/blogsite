<?php 

	require_once('included_functions.php');
	require_once('databaseAccess.php');
	if(isset($_POST['submit'])){
		$username=$_POST["Username"];
		$Password=$_POST["Password"];
	
	$host="localhost";
 	$hostname = 'root';
	$host_pass = 'harshvardhan';

		//form was submitted
		$db = @mysql_connect($host,$hostname,$host_pass);
		$arrae = dataBase('hglabs',$username);
		mysql_close($db);
		if($username==$arrae['username'] && $Password==$arrae['password'])
		{

			session_start();
			$_SESSION["username"]=$username;
			$_SESSION["Password"]=$Password;
			ECHO $_SESSION;		
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
		Username:<input type="text" name="Username" placeholder="Username or email" required="true"><br>
		
		Password:<input type="Password" name="Password" value="" placeholder="Password" required="true"><br>
		<br>
		<input type="submit" name="submit" value="submit">
	
	</fieldset>
	</form>

	
</body>
</html>