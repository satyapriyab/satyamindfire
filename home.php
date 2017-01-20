<?php
    session_start();
    
    $dbname = mysqli_connect("localhost", "root", "", "mydb");
    
    if (isset($_POST['login-btn']))
    {
        //session_start();
        $name = mysql_real_escape_string($_POST['username']);
        $pass = mysql_real_escape_string($_POST['password']);
        $user = mysql_real_escape_string($_POST['selectUser']);
        
        $sql = "SELECT * FROM logindata WHERE user='$user' AND name='$name' AND password='$pass'";
        $result = mysqli_query($dbname,$sql);
        
        if(mysqli_num_rows($result) == 1) {
            //$row = $result->fetch_assoc(); 
            //$_SESSION["userid"] = $row['id'];
            header("location:home.php");//redirect to home page
        }
        else {
            //$_SESSION["message"] = "Your email or password is incorrect";
            echo "Your email or password is incorrect";
            header("location:login.php");
        }
    }
?>

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
</body>
</html>
