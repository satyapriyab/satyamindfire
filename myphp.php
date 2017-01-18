<?php
    echo $_POST["name"];
    $name = $_POST["name"];
    //$password =$_POST["password"];
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

    $sql = "INSERT INTO myform (username)
    VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>