<!DOCTYPE html>
<html>
<head>
	<title>Delete Records from Database</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <!--ISAAC COFFIE-->
    <!--sASSIGNMENT 19 FEB-->
<?php
$deleteId = isset($_POST["id"]) ? $_POST["id"] : 0;
$user = isset($_POST["username"]) ? $_POST["username"] : "";

		$localhost = "localhost";
        $username = "root";
        $password = "pages";
        $database = "webtechclass";

        // get connection
        $conn = mysqli_connect($localhost, $username, $password, $database);

        //check if connection is ok
        if (!$conn) {
        	echo "<center><h3 style='color:red'>Connection Unsuccessful ". "</h3></center>" ;
        }
        else{
        	echo "<center><h3 style='color:green'>Connection Successful "."</h3></center>" ;

        
        //execute query
        $queryStatement = "DELETE FROM webtechtable WHERE id ='$deleteId'";
        $query = mysqli_query($conn, $queryStatement);

        if(mysqli_affected_rows($conn)){
        	echo "<center><h3 style='color:green'>". $user." Deleted Successfully "."</h3></center>" ;

        }
        else{
        	echo "<center><h3 style='color:red'> Delete Unsuccessful ". "</h3></center>" ;
        }

     } 
  

?>
<!--start navigation bar-->
<div class="container" >

	<div class="menu" >
			<ul>
			<li><a href="insert.php">Insert</a></li>
			<li><a href="update.php">Update</a></li>
			<li><a href="delete.php">Delete</a></li>
			<li><a href="select.php">Display</a></li>
			</ul>
	</div>
	</div>
<!--end navigation bar-->
<br><br><br><br><br><br><br>
	<center><h2>To Delete, Select a Record from the Display Page </h2></center>
</body>
</html>