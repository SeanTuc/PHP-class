<?php
// connection string version from class
$dsn = 'mysql:host=us-cdbr-azure-southcentral-f.cloudapp.net;dbname=sean_tucker';
$userName = 'b443d4f6b8b1a7';
$password = '7e42bc2c';


try {
// instantiates a new pdo end displays if it successfully connected
$db = new PDO($dsn, $userName, $password);
echo "Connected to database";

}
catch(PDOException $e) {
$message = $e->getMessage();
echo "An error occurred: " . $message;
}

?>