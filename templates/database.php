<?php
try{
	$this->conn = new PDO("mysql:host=localhost; dbname = myblog", 'root', '');
	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
}
catch(PDOException $m){
	echo "Conection failed: " . $m->getMessage();
}
$conn = null;
?>
