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

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



</head>
<body>
	<form action="login.php" method="post">
	<fieldset class='fieldsets'>
	<legend><img src="res/admin.png" height="100" width="100"></legend>
		<?php echo $message."<br>";?>
		Username:<input type="text" name="Username" placeholder="Username or email" required="true"><br>
		
		Password:<input type="Password" name="Password" value="" placeholder="Password" required="true"><br>
		<br>
		<input type="submit" name="submit" value="submit">
	
	</fieldset>
	</form>
<style type="text/css">
	body{
		
	}
	fieldset {
	display: block;
    margin-left: 2px;
    margin-right: 2px;
    padding-top: 0.35em;
    padding-bottom: 0.625em;
    padding-left: 0.75em;
    padding-right: 0.75em;
     }

</style>
	
</body>
</html>