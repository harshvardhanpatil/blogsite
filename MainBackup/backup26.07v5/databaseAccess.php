<?php
	function dataBase($databaseName,$username) {
		if(@mysql_select_db($databaseName))
			{
				echo "<br>connected to DB<br>";

				$_query="select * from login where username = '" . $username."'";
				$_result = mysql_query($_query);
				$_qexe = mysql_fetch_array($_result);
			
		 		return $_qexe;	
				
		}
		else{
			echo $databaseName;
			echo 'DataBase not connected';
			return null;
		}

	}

	
	function display($dataBase)
	{	
		
		if(@mysql_select_db($dataBase))
		{
			
			$count=1;
			$_query="select * from login";
			if($isqr=mysql_query($_query)){
				echo '<table border="1" style="width:300px">';
				echo '<tr><th></th><th>Sr no</th><th>username</th><th>password</th></tr>';
				while ($qexe=mysql_fetch_assoc($isqr)) {
					echo '<tr ><td><input type = "checkbox"/></td>';
					echo '<td>'.$count.'</td><td>'.$qexe["username"].'</td><td>'.md5($qexe["password"]).'</td></tr>';
					$count++;

					# code...
				}
				echo "</table>";
			}
		}	

	}
	function createUser($data,$user,$pas) {
		
		if(@mysql_select_db($data))
		{
			$query='insert into login (username,password) values ("'.$user.'","'.$pas.'")';
			mysql_db_query($data,$query);
		}

	}
		function deleteUser($data,$user) {
		echo $user;
		echo "inside function";
		if(@mysql_select_db($data))
		{
			$query='DELETE FROM login WHERE username =  "'. $user .'"';
			mysql_db_query($data,$query);
		}

	}

?>