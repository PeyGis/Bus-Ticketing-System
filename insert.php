<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <!--ISAAC COFFIE-->
    <!--sASSIGNMENT 19 FEB-->

<?php
  $name = '';
  $gender = '';
  $color = '';

  if (isset($_POST['submit'])) {
    $ok = true;
    if (!isset($_POST['name']) || $_POST['name'] === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    }
    if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
    } else {
        $gender = $_POST['gender'];
    }
    if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
    } else {
        $color = $_POST['color'];
    }

    if ($ok) {
        // add database code here

        //declare variables
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
        $queryStatement = "INSERT INTO webtechtable (username,gender,color) VALUES ('$name', '$gender', '$color')";
        $query = mysqli_query($conn, $queryStatement);

        if($query){
        	echo "<center><h3 style='color:green'>Insertion Successful "."</h3></center>" ;

        }
        else{
        	echo "<center><h3 style='color:red'> Insertion Unsuccessful ". "</h3></center>" ;
        }

     }   
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
<center>
<br><br><br>
<form method="post" action="" style="color: #000;">
<h3>Insert Records into Database</h3>
    User name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
    ?>"><br><br>
    Gender:
        <input type="radio" name="gender" value="f"<?php
            if ($gender === 'f') {
                echo ' checked';
            }
        ?>>female
        <input type="radio" name="gender" value="m"<?php
            if ($gender === 'm') {
                echo ' checked';
            }
        ?>>male<br><br>
    Favorite color:
        <select name="color">
            <option value="">Please select</option>
            <option value="Red"<?php
                if ($color === 'Red') {
                    echo ' selected';
                }
            ?>>red</option>
            <option value="Green"<?php
                if ($color === 'Green') {
                    echo ' selected';
                }
            ?>>green</option>
            <option value="Blue"<?php
                if ($color === 'Blue') {
                    echo ' selected';
                }
            ?>>blue</option>
        </select><br><br>
    <input type="submit" name="submit" value="Submit">
</form>
</center>
</body>
</html>