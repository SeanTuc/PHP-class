<?php
session_start();
$tableName = $_SESSION['tableID'];
include_once('database.php');

$contactID = $_GET["contactID"]; // assigns the contactID from the URL

if($contactID != false) {
    $query = "DELETE FROM $tableName WHERE id = $contactID ";
    $statement = $db->prepare($query);
    $success = $statement->execute(); // execute the prepared query
    $statement->closeCursor(); // close off database
    echo "deleted";
}

// redirect to index page
header('Location: todo.php');

?>