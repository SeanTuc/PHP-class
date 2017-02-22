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
    // set the way to deal with returns -> error mode to exception;
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // grabbing $_POST's;
    $loginName = filter_input(INPUT_POST, "userTextField");
    $loginPassword = filter_input(INPUT_POST, "passwordTextField");
    $new = filter_input(INPUT_POST, "existingUser");
    // trouble shooting;
    echo "<br>";
    echo filter_input(INPUT_POST, "userTextField") . "<br> omg work<br>" ;
    echo $new;


    // grabbing data from mySQL
    $query = "SELECT * FROM login ";
    $statement = $conn->prepare($query);
    $statement->execute();
    $loginInfos = $statement->fetchAll();
    $statement->closeCursor();
    $missing = false;
    $counter = 0;


    foreach($loginInfos as $loginInfo) :
        echo $loginInfo['username'] . "   user <br>";
        echo $loginInfo['password'] . " password <br>";
        echo " password =" . strcasecmp($loginInfo['password'], $loginPassword);
        echo " username =" . strcasecmp($loginInfo['username'], $loginName);
        if ((strcasecmp($loginInfo['password'], $loginPassword)==0) && (strcasecmp($loginInfo['username'], $loginName)==0)) {
            $header = 'Location: todo.php?loginName=' . $loginName;
            $counter = 1;

            echo $header;
            echo "login success  destination = " . $header  ;
            $_SESSION['userid'] = $loginName;
            $tableName =  $loginName . "TodoList";

            $_SESSION['tableID'] = $tableName;

             header($header);

        } //not sure if this will work
        elseif (strcasecmp($loginInfo['username'], $loginName)==0) {
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
    workoutTime VARCHAR(300) 
    )";
        $conn->exec($sql);

        $sql = "INSERT INTO $tableName (userName, name) VALUES ('$loginName', '$nameHolder')";

        // use exec() because no results are returned
        $conn->exec($sql);
        $header = 'Location: accountCreated.php';
        header($header);
        echo "Table todo list was created successfully   STOOOOOOOOOOOOOOOOPPPPPPPPPPPPP"; // trouble shooting purposes;
    }
    //testing fail safes
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

echo "here  end SSTTTTTOOOOPPPPPP"; //trouble shooting purposes ;
$header = 'Location: todo.php?loginName=' . $loginName;
echo $header;
$conn = null;
//header($header);
?>