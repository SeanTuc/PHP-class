<?php
session_start();
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = 'b443d4f6b8b1a7';
$password = '7e42bc2c';
$dbname = "sean_tucker";
$tableName = $_SESSION['tableID'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $isEmpty = filter_input(INPUT_POST, "isEmpty");
    $contactName = filter_input(INPUT_POST, "NameTextField"); //$_POST["NameTextField"];
    $contactLastName = filter_input(INPUT_POST, "lastNameTextField"); //$_POST["NameTextField"];
    $contactEmail = filter_input(INPUT_POST, "emailTextField"); //$_POST["NameTextField"];
    $contactCost = filter_input(INPUT_POST, "CostTextField"); //$_POST["CostTextField"];

    /*id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30),
    name VARCHAR(50),
    Homework VARCHAR(50),
    feedPet VARCHAR(50),
    workoutTime VARCHAR(50)
*/
    if ($isEmpty == "1") {
        $sql = "INSERT INTO $tableName ( name, Homework, feedPet, workoutTime) 
VALUES ('$contactName', '$contactLastName', '$contactCost', '$contactEmail')";

        $conn->exec($sql);
        echo "New record created successfully";
    } else {
        $contactID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
        $sql = "UPDATE $tableName SET name = '$contactName', Homework = '$contactLastName', feedPet = '$contactCost', workoutTime = '$contactEmail'
 WHERE id = $contactID "; // SQL statement

        $conn->exec($sql);
        echo "New record created successfully";

    }


}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
// redirect to index page
 header('Location: todo.php');
?>
