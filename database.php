<?php
// connection string



$dsn = 'mysql:host=us-cdbr-azure-southcentral-f.cloudapp.net;dbname=sean_tucker';
$userName = 'b443d4f6b8b1a7';
$password = '7e42bc2c';


// exception handling - use a try / catch
try {
// instantiates a new pdo - an db object
$db = new PDO($dsn, $userName, $password);
echo "connected to database";

}
catch(PDOException $e) {
$message = $e->getMessage();
echo "An error occurred: " . $message;
}

?>