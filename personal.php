
<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="assets/css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <li><a href="#">Home</a></li>
    <li><a href="allusers.php">Users</a></li>
    <li><a href="personal.php">Personal Info</a></li>
  </ul>
</nav>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
        //session_start();
        $name = mysql_real_escape_string($_POST['username']);
        $pass = mysql_real_escape_string($_POST['password']);
        
        $sql = "SELECT user, name, emaiL FROM logindata WHERE name='$name' AND password='$pass'";
        $result = $conn->query($sql);
        
	if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<br> user: ". $row["user"]. " - Name: ". $row["name"]. " - Email: " . $row["email"] . "<br>";
	}
	} else {
	echo "0 results";
	}
	$conn->close();
	?>  

</body>
</html>