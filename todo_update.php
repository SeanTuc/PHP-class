<?php
session_start();
// setting database variables (custom connection) due to errors inserting information with include;
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = 'b443d4f6b8b1a7';
$password = '7e42bc2c';
$dbname = "sean_tucker";
$tableName = $_SESSION['tableID'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // setting conn attributes on how to handle mySQL returns;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //setting variable values;
    $isEmpty = filter_input(INPUT_POST, "isEmpty");
    $contactName = filter_input(INPUT_POST, "NameTextField");
    $homeworkDone = filter_input(INPUT_POST, "workNameTextField");
    $petTime = filter_input(INPUT_POST, "petTextField");
    $workoutTime = filter_input(INPUT_POST, "workoutTextField");


    // testing to see if i am adding a new row into the table or editing a current one;
    if ($isEmpty == "1") {
        $sql = "INSERT INTO $tableName ( name, Homework, feedPet, workoutTime) 
VALUES ('$contactName', '$homeworkDone', '$workoutTime', '$petTime')";

        $conn->exec($sql);
        echo "Record created successfully";
    } else {
        $contactID = filter_input(INPUT_POST, "IDTextField"); // $_POST["IDTextField"];
        $sql = "UPDATE $tableName SET name = '$contactName', Homework = '$homeworkDone', feedPet = '$petTime', workoutTime = '$workoutTime'
 WHERE id = $contactID "; // SQL statement

        $conn->exec($sql);
        echo "Record uodated successfully";

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
