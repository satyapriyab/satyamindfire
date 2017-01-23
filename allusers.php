<!--
* File    : allusers.php
* Purpose : Contains all html data and Php data for Admin showing all users
* Created : 20-jan-2017
* Author  : Satyapriya Baral
-->

<?php
  session_start();
  $PageTitle = "allUsers";
  include_once 'header.php';
?>
<body>
  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="home.php">Home</a></li>
      <li class="active"><a href="allusers.php">Users</a></li>
      <li><a href="personal.php">Personal Info</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signout.php"><span></span> Signout</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="col-md-6 col-md-offset-3">
    <table  class="table-striped table-bordered table-hover table-condensed">
      <tr>
        <th>User</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
  </div>
</div>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "myDB";

  $conn = new mysqli($servername, $username, $password, $dbname);
     
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
     
  $sql = "SELECT id, user, name, email FROM logindata";
  $result = $conn->query($sql);
     
  if ($result->num_rows > 0) {
    // output data of each row
    $delete='Delete';
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["user"]. "</td>";
      echo "<td>" . $row["name"]. "</td>";
      echo "<td>" . $row["email"] . "</td>";
      echo "<td><a href=\"delete.php?id=".$row['id']."\">Delete</a></td>";
      echo "<td><a href=\"update.php?id=".$row['id']."\">Update</a></td>";
      echo "</tr>";
    }
  } else {
    echo "0 results";
  }
?>
        
<?php
  include_once 'footer.php';
?>