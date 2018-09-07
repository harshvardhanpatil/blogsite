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
</head>
<body>
	

	<input id = "logout_btn" type = "submit" value = "Logout" onclick = "demo()"/>
	<script type = "text/javascript">
		
		function demo() {
			alert("Logout Successful");
			
			window.location.replace("../logout.php");
		}
	</script>

	<?php
	@mysql_connect($host,$hostname,$host_pass);
	display("hglabs");  
	//form();
	?>
	<p id = 'username'></p>
	<p id='password'> </p>
<input id = "create_btn" type = "submit" value = "Create User" onclick = "buttonClick()"/>

<!--JavaSCRIPT here ; Proceed with Caution -->
	<script type = "text/javascript">
		var once = 0;
		var password;
		var username;

		function buttonClick() {
		
		if(once == 1) {
			elements();
			window.location.replace('red.php');
		}
		createForm();
		document.getElementById('create_btn').value = 'Submit';
		once ++;
		}

		function createForm() {
		var text = "<?php echo 'Username:'?>";
		document.getElementById('username').innerHTML = text;
		var un = document.createElement("INPUT");
		un.setAttribute('type','text');
		un.setAttribute('id','uname');
		un.setAttribute('placeholder','Enter Username');
		document.getElementById('username').append(un);


		var text = "<?php echo 'Password:'?>";
		document.getElementById('password').innerHTML = text;
		var pass = document.createElement("INPUT");
		pass.setAttribute('type','password');
		pass.setAttribute('id','pass');
		pass.setAttribute('placeholder','Password');
		document.getElementById('password').append(pass);
		
		}
		function elements() {
			username = document.getElementById('uname').value;
			password = document.getElementById('pass').value;
			//called(username);
			//alert(username+password);
			document.cookie="uname="+username;
			document.cookie="pass="+password;


			//window.sessionStorage.setItem("uname",username);

			//alert( window.sessionStorage.getItem("uname"));
		}

	</script>



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