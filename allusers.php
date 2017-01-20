<!--
* File    : allusers.php
* Purpose : Contains all html data and Php data for Admin showing all users
* Created : 20-jan-2017
* Author  : Satyapriya Baral
-->

<?php
  $PageTitle = "allUsers";
  include_once 'header.php';
?>
     <nav class="navbar navbar-inverse">
          <ul class="nav navbar-nav">
               <li><a href="#">Home</a></li>
               <li><a href="allusers.php">Users</a></li>
               <li><a href="personal.php">Personal Info</a></li>
               <li><a href="login.php">Signout</a></li>
          </ul>
     </nav>
     <table  class="table-striped table-bordered table-hover table-condensed">
        <tr>
          <th>User</th>
          <th>Name</th>
          <th>Email</th>
        </tr>

     <?php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "myDB";

     $conn = new mysqli($servername, $username, $password, $dbname);
     
     if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
     } 
     
     $sql = "SELECT user, name, email FROM logindata";
     $result = $conn->query($sql);
     
     if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["user"]. "</td>";
              echo "<td>" . $row["name"]. "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "</tr>";
          }
     } else {
          echo "0 results";
     }
     
     $conn->close();
     ?>  

<?php
  include_once 'footer.php';
?>