
		var once = 0;
		var flag=0;
		var password;
		var username;

		function demo() {
			alert("Logout Successful");
			window.location.replace("../logout.php");
		}

		function createbtn() {
			if(once == 1) {
				elements();
				window.location.replace('red.php');
			}
			createForm();
			document.getElementById('create_btn').value = 'CREATE';
			once ++;
			document.getElementById('delete_btn').value = 'Delete User';
			flag=0;
		}

		function createForm() {
			var text = "<?php echo 'Username:'?>";
			document.getElementById('username').innerHTML = text;
			var un = document.createElement("INPUT");
			un.setAttribute('type','text');
			un.setAttribute('id','uname');
			un.setAttribute('placeholder','Enter Username');
			un.setAttribute('required','true');
			document.getElementById('username').append(un);
			var text = "<?php echo 'Password:'?>";
			document.getElementById('password').innerHTML = text;
			document.getElementById('password').style.display = 'block';
			
			var pass = document.createElement("INPUT");
			pass.setAttribute('type','password');
			pass.setAttribute('id','pass');
			pass.setAttribute('placeholder','Password');
			pass.setAttribute('required','true');
			document.getElementById('password').append(pass);
		
		}

		function elements() {
			username = document.getElementById('uname').value;
			password = document.getElementById('pass').value;
			document.cookie="uname="+username;
			document.cookie="pass="+password;
		}

		function deletebtn(){
			if(flag==1){
				elements1();
				alert("Root user can't be deleted from norm");
				window.location.replace("delred.php");
			}

			var text = "<?php echo 'Username:'?>";
			document.getElementById('username').innerHTML = text;
			var un = document.createElement("INPUT");
			un.setAttribute('type','text');
			un.setAttribute('id','uname');
			un.setAttribute('placeholder','Enter Username');
			un.setAttribute('required','true');
			document.getElementById('username').append(un);
			document.getElementById('password').style.display = 'none';
			document.getElementById('delete_btn').value = 'DELETE';

			document.getElementById('create_btn').value = 'Create User';
			once = 0 ;
			flag++;
			
		}
		function elements1(){
			username = document.getElementById('uname').value;
			document.cookie="uname="+username;
			
		}


	
