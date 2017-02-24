<!DOCTYPE html>
<html>
<head>
    <title>Update Records</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <!--ISAAC COFFIE-->
    <!--sASSIGNMENT 19 FEB-->
<?php
  $name = "";
  $gender = "";
  $color = "";
  $tempname = "";
  
  $name2 = "";
  $gender2 = $color2 = "";
   
        // declare variables
    define('HOST', "localhost");
    define('USERNAME', "root");
    define('PASSWORD', "pages");
    define('DBNAME', "webtechclass");

if (isset($_POST['updatesubmit'])) {
     $okay = true;

    if (!isset($_POST['updatename']) || empty($_POST['updatename'])) {
        $okay=false;
    } else {
        $tempname =htmlspecialchars($_POST['updatename']);
    }

    if($okay){
    
    //connect to database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD,DBNAME);

    if ($conn) {
    


        //query statement
        $queryStatement = "SELECT * FROM webtechtable WHERE username = '$tempname'";

        //execute query
        $results = mysqli_query($conn, $queryStatement);
        //check if results was ruturn
        if(mysqli_num_rows($results)  == 1){
            
            $record=mysqli_fetch_array($results,MYSQLI_ASSOC);
           
                $gender2=$record['gender'];
                $gender = $gender2;
                $name2= htmlspecialchars($record['username']);
                $name = $name2;
                $color2= $record['color']; 
                $color = $color2;
                //printf('%s %s %s', $name2,$gender2,$color2);   
        } 
        else{
            echo "<center><h3 style='color:red'>No Record found "."</h3></center>" ;
        }
    }
  }
}


//send edited data to form
    if (isset($_POST['submit'])) {
    $ok = true;
    if ($_POST['name'] === '') {
       // $ok = false;
    } else {
        $name = $_POST['name'];
    }
    if ($_POST['gender'] === '') {
       //8 $ok = false;
    } else {
        $gender = $_POST['gender'];
    }
    if ($_POST['color'] === '') {
        //$ok = false;
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

        
          $tempname =htmlspecialchars($_POST['updatename']);
            
        //execute query
        $queryStatement = "UPDATE webtechtable  SET username = '$name', gender = '$gender', color = '$color' WHERE username = '$tempname' ";
        $query = mysqli_query($conn, $queryStatement);

        if(mysqli_affected_rows($conn)){
            echo "<center><h3 style='color:green'>Update Successful "."</h3></center>" ;

        }
        else{
            echo "<center><h3 style='color:red'> Update Unsuccessful ". "</h3></center>" ;
        }

     }   
    }
  }
?>


<!--start navigation bar-->
<div class="container">

    <div class="menu">
            <ul>
            <li><a href="insert.php">Insert</a></li>
            <li><a href="update.php">Update</a></li>
            <li><a href="delete.php">Delete</a></li>
            <li><a href="select.php">Display</a></li>
            </ul>
    </div>
    </div>
<!--end navigation bar-->
<br><br>
<center>
<form method="post" style="color: #000">
<fieldset>
        <legend>Update Authentication:</legend>
    User name: <input type="text" name="updatename" placeholder="enter name to search"  value="<?php
        echo htmlspecialchars($tempname);
    ?>"><br><br>
    <input type="submit" name="updatesubmit" value="Search"><br><br><hr>
<!--/fieldset>

<br><br><br>
<fieldset-->
        <legend>Edit Your Records Here</legend>
    User name: <input type="text" name="name" value="<?php
        echo htmlspecialchars($name);
    ?>"><br><br>
    Gender:
        <input type="radio" name="gender" value="f"<?php
            if (htmlspecialchars($gender)=== 'f') {
                echo ' checked';
            }
        ?>>female
        <input type="radio" name="gender" value="m"<?php
            if (htmlspecialchars($gender)=== 'm') {
                echo ' checked';
            }
        ?>>male<br><br>
    Favorite color:
        <select name="color">
            <option value="">Please select</option>
            <option value="Red"<?php
                if (htmlspecialchars($color) === 'Red') {
                    echo ' selected';
                }
            ?>>red</option>
            <option value="Green"<?php
                if (htmlspecialchars($color) === 'Green') {
                    echo ' selected';
                }
            ?>>green</option>
            <option value="Blue"<?php
                if (htmlspecialchars($color) === 'Blue') {
                    echo ' selected';
                }
            ?>>blue</option>
        </select><br><br>
    <input type="submit" name="submit" value="Submit">
    </fieldset>
</form>
</center>


</body>
</html>