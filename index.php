<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<!--ISAAC COFFIE-->
	<!--sASSIGNMENT 19 FEB-->

	<?php

	// PHP Codes starts here 
		$username = $pword = "";
		
		if (isset($_POST["submit"])) {
			$ok = true;

			if (!isset($_POST['name']) || $_POST['name'] === '') {
        		$ok = false;
    		} else {
        		$username = $_POST['name'];
        	}

        	if (!isset($_POST['pswd']) || $_POST['pswd'] === '') {
        		$ok = false;
    		} else {

				$pword = $_POST["pswd"];
			}
			
			if($ok) {
				login($username, $pword);
			}
		}

		function login($name, $pword){
				//include database connection
				include("dbconnect.php");

				if($conn){
					echo "<center style= 'color:#fff'>database connection successful</center>";


					//execute query
			        $queryStatement = "SELECT * FROM webtechlogin WHERE username = '$name' AND passwd ='$pword'";
			        $query = mysqli_query($conn, $queryStatement);

			        if(mysqli_num_rows($query) > 0){
			  
			        	echo "<center><h3 style='color:green'>Login successful</h3></center>" ;
			        	
			        	header("location:mainmenu.php");
			        }
			        else{
			        	echo "<center><h3 style='color:red'> Login failed. Try Again!!! ". "</h3></center>" ;
			        }
				}

				else{
					die("couldn't connect to database");
				}
		}



	?>
	<center>
		<h3 style="color: #fff">Explore the World of PHP Database</h3>
		<form method="post" action="">
		<fieldset>
		<legend>Login Page:</legend>
			<label for="name">Username:</label>
			<input type="text" name="name" id="name"> <br> <br>
			<label for="password">Password:</label>
			<input type="password" name="pswd" id="password"> <br> <br>
			<input type="submit" name="submit" value="Submit"> <br> <br>
		</fieldset>	
		</form>
	</center>
</body>
</html>