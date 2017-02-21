<?php
//session_destroy();
session_start();
$nameHolder = $_SESSION['userid'];
$servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
$username = 'b443d4f6b8b1a7';
$password = '7e42bc2c';
$dbname = "sean_tucker";
$new = "no";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $loginName = filter_input(INPUT_POST, "userTextField"); //$_POST["NameTextField"];
    $loginPassword = filter_input(INPUT_POST, "passwordTextField"); //$_POST["NameTextField"];
    $new = filter_input(INPUT_POST, "existingUser"); //$_POST["NameTextField"];
    echo "<br>";
    echo filter_input(INPUT_POST, "userTextField") . "<br> omg work<br>" ;
    echo $new;



    $query = "SELECT * FROM login "; // SQL statement
    $statement = $conn->prepare($query); // encapsulate the sql statement
    $statement->execute(); // run on the db server
    $contacts = $statement->fetchAll(); // returns an array
    $statement->closeCursor(); // close the connection
    $missing = false;
    $counter = 0;


    foreach($contacts as $contact) :
        echo $contact['username'] . "   user <br>";
        echo $contact['password'] . " password <br>";
        echo " password =" . strcasecmp($contact['password'], $loginPassword);
        echo " username =" . strcasecmp($contact['username'], $loginName);
        if ((strcasecmp($contact['password'], $loginPassword)==0) && (strcasecmp($contact['username'], $loginName)==0)) {
            $header = 'Location: todo.php?loginName=' . $loginName;
            $counter = 1;

            echo $header;
            echo "login success  destination = " . $header  ;
            $_SESSION['userid'] = $loginName;
            $tableName =  $loginName . "TodoList";

            $_SESSION['tableID'] = $tableName;

             header($header);

        } //not sure if this will work
        elseif (strcasecmp($contact['username'], $loginName)==0) {
            $counter = 1;
            echo "elseif";
            header('Location: invalidUserName.php');
        }
    endforeach;
    if($counter == 0)
    {
        $sql = "INSERT INTO login (username, password) VALUES ('$loginName', '$loginPassword')";

        // use exec() because no results are returned
        $conn->exec($sql);


        echo $loginName . "inserted into table";
        $tableName =  $loginName . "TodoList";
        echo $tableName;
        $_SESSION['userid'] = $loginName;
        $_SESSION['tableID'] = $tableName;
        // sql to create table
        $sql = "CREATE TABLE $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(30),
    name VARCHAR(50),
    Homework VARCHAR(50),
    feedPet VARCHAR(50),
    workoutTime VARCHAR(50) 
    )";
        $conn->exec($sql);

        $sql = "INSERT INTO $tableName (userName, name) VALUES ('$loginName', '$nameHolder')";

        // use exec() because no results are returned
        $conn->exec($sql);
        $header = 'Location: accountCreated.php';
        header($header);
        echo "Table todo list was created successfully   STOOOOOOOOOOOOOOOOPPPPPPPPPPPPP";
    }
/*    elseif ($counter == 1)
    {
        echo "username taken failed    STTTTTTTOOOOOOOOOOOOPPPPPPPPPPP ";
        $header = 'Location: invalidUserName.php';
        //header($header);
    }
    else{
        echo "Login failed   STTTTTOOOOOPPPPPPP ";
        $header = 'Location: invalidUserName.php';
        //header($header);

    }*/
}
catch(PDOException $e)
{
    echo  "<br>" . $e->getMessage();
}
echo "here  end SSTTTTTOOOOPPPPPP";
$header = 'Location: todo.php?loginName=' . $loginName;
echo $header;
$conn = null;
//header($header);
?>