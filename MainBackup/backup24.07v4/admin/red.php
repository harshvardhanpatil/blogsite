<?php
	//print_r($_COOKIE);
	$username=$_COOKIE["uname"];
	$password=$_COOKIE["pass"];
	$_COOKIE=[];
	$host="localhost";
 	$hostname = 'root';
	$host_pass = 'harshvardhan';
	if(!$db = @mysql_connect($host,$hostname,$host_pass))
	{
		die("cannot connect");
	}
	else 
	{
		require_once "../databaseAccess.php";
		createUser("hglabs",$username,$password);
	}



	//print_r($_COOKIE);
	//echo $username;
	//echo $password;
	?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body onload="cookie()">
	
<script type="text/javascript">
	function cookie(){


	document.cookie="uname=;expires=Thus,01 Jan 1970 00:00:00 UTC;path=/;";
	window.location.replace("manageu.php");
}
</script>
</body>
</html>