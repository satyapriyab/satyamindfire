<?php
class DBController {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "mydb";
	

	function connectDB() {
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	}
/*
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
		function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}
	
	function deleteQuery($query) {
		$result = mysql_query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}*/
}
?>