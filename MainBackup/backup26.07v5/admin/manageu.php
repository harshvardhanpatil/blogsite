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
	<title>Manage User</title>
	<script type="text/javascript" src="../javascripts/manageu.js"></script>
</head>
<body>
	

	<input id = "logout_btn" type = "submit" value = "Logout" onclick = "demo()"/>
	

	<?php
	@mysql_connect($host,$hostname,$host_pass);
	display("hglabs");  
	//form();
	?>
	<p id = 'username'></p>
	<p id='password'> </p>
<input id = "create_btn" type = "submit" value = "Create User" onclick = "createbtn()"/>


<input id = "delete_btn" type = "submit" value = "Delete User" onclick = "deletebtn()"/>


<!--JavaSCRIPT here ; Proceed with Caution -->
	


<!--<?php
	/*$_SESSION["uname"]='<script>
	var username;
	function called(p1)
	{
		username=p1;

	}
	document.writeln(username);
	</script>';
	//echo $_SESSION["uname"];*/
?>-->
</body>
</html>