<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'myDB';
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST["register-btn"]))
    {
        $user = mysql_real_escape_string($_POST['selectUser']);
        $name = mysql_real_escape_string($_POST['username']);
        $email = mysql_real_escape_string($_POST['email']);
        $pass = mysql_real_escape_string($_POST['password']);
        
        //$stmt = $conn->prepare("INSERT INTO logindata (user, name, email, password) 
        //VALUES (:user, :name, :email, :password)");
        //$stmt->bindParam(':user', $user);
        //$stmt->bindParam(':name', $name);
        //$stmt->bindParam(':email', $email);
        //$stmt->bindParam(':password', $pass);
        $sql = "INSERT INTO logindata (user, name, email, password)
        VALUES ('$user','$name','$email','$pass')";
        $conn->exec($sql);
        header("location:login.php");
    }
    $conn = null;