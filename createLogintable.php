<?php
session_start();
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = 'b443d4f6b8b1a7';
$password = '7e42bc2c';
$dbname = "sean_tucker";

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




//$loginName = filter_input(INPUT_POST, "loginTextField"); //$_POST["NameTextField"];
//$tableName = $loginName + "todoList";
// sql to create table
$sql = "CREATE TABLE login (
username VARCHAR(30) PRIMARY KEY,
password VARCHAR(40) NOT NULL
)";

// use exec() because no results are returned
$conn->exec($sql);
echo "Table todo list was created successfully";
}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>