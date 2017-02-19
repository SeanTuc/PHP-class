<?php
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = 'b443d4f6b8b1a7';
$password = '7e42bc2c';
$dbname = "sean_tucker";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE todolist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30) NOT NULL,
    password VARCHAR(40) NOT NULL,
    name VARCHAR(50),
    Homework VARCHAR(50),
    feedPet VARCHAR(50),
    workoutTime VARCHAR(50) 
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