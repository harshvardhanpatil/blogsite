<?php
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
		if($username != '' && $password != '')
			createUser("hglabs",$username,$password);
	}

	echo '<script type="text/javascript">
	document.cookie="uname=;expires=Thus,01 Jan 1970 00:00:00 UTC;path=/;";
	window.location.replace("manageu.php");
</script>';
?>