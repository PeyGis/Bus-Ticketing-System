<!DOCTYPE html>
<html>
<head>

	<!--ISAAC COFFIE-->
	<!--sASSIGNMENT 19 FEB-->
	<title>Display records</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		table {
    	border-collapse: collapse;
    	width: 80%;
		}

		td, th {
    	border: 0.5px solid gray;
    	text-align: center;
    	padding: 2%;
		}
		th{
			background-color: #fff;
			color: #141E30;
		}
		form{
			background-color: transparent;
		}
	</style>
	
</head>
<body>
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
<center><h1>Display results from database</h1></center>

<?php
define('HOST', "localhost");
define('USERNAME', "root");
define('PASSWORD', "pages");
define('DBNAME', "webtechclass");

//connect to database
$conn = mysqli_connect(HOST, USERNAME, PASSWORD,DBNAME);

if ($conn) {
	echo "<center><h3 style='color:green'>Connection Successful "."</h3></center>" ;


	//query statement
	$queryStatement = "SELECT * FROM webtechtable";

	//execute query
	$results = mysqli_query($conn, $queryStatement);

	//check if results was returned
	if(mysqli_num_rows($results)){
		echo "<center><table>";
		echo "<tr> <th> User Name </th> <th> Gender </th> <th> Color </th> <th> Action </th></tr>";
		//loop through
	foreach ($results as $value) {
		$id = $value['id'];
		echo "<tr><td>";
		echo $value['username'];
		echo "</td><td>";
		echo $value['gender'];
		echo "</td><td>";
		echo $value['color'];
		echo "</td><td>";
		echo '<form action="delete.php" method="POST">';
	    echo '<input type="hidden" name="id" value="'.$value['id'].'">';
	    echo '<input type="hidden" name="username" value="'.$value['username'].'">';
        echo '<input type="submit" value="Delete"></form>';
		//echo '<a href="delete.php?deleleteId=<?php echo $id;
		//8button name="delete"> See More</button></a>';
		//echo '<input type="submit" value="Delete"/>';
		echo "</td></tr>";

	}
	echo "</table></center>";
	}

	
}
else{
	die("cannot connect");
}


?>
</body>
</html>