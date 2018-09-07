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
?>