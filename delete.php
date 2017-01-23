<?php
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "myDB";

	$conn = new mysqli($servername, $username, $password, $dbname); 
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $id = $_GET['id']; // $id is now defined

    mysqli_query($conn,"DELETE FROM logindata WHERE id='".$id."'");
    mysqli_close($conn);
    header("Location: allusers.php");
?> 