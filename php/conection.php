<?php
define('HOST',       'localhost');
define('DB_NAME',    'ordinary_side');
define('USER_NAME',  'root'     );
define('PASSWORD',   'root'     );

$DataBaseHandle = mysqli_connect(HOST, USER_NAME, PASSWORD) or die (mysqli_error($DataBaseHandle));
mysqli_select_db($DataBaseHandle, DB_NAME) or die (mysqli_error($DataBaseHandle));

function runQuery($DataBaseHandle,$query) {
    $result = mysqli_query($DataBaseHandle, $query);
    while($row=mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }		
    if(!empty($resultset))
        return $resultset;
}
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "root";
	private $database = "ordinary_side";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>