<?php
session_start();
include_once('database.php');
if ($_SESSION['userid'] == null)
{
    header('Location: login.php');
}

$new = $_SESSION['userid'];
$tableName = $_SESSION['tableID'];

//mySQL statements;
$query = "SELECT * FROM $tableName ";
$statement = $db->prepare($query);
$statement->execute();
$todos = $statement->fetchAll();
$statement->closeCursor();
//setting variables;
$missing = false;
$counter = 0;
$daycount = 0;
$day = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saterday")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <!-- CSS -->

    <link rel="stylesheet" href="Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="Content/app.css">


</head>
<header>
    <h1 style="text-align: center;">Todo Login </h1>
    <nav class="navbar navbar">
        <div class="container">
        <ul class="nav nav-tabs nav-justified">
            <li><a href="index.php" title="Home">Home</a></li>
            <li><a href="login.php" title="Login">Login</a></li>
            <li><a href="todo.php" title="My Account">My Tasks</a></li>
            <li><a href="logout.php" title="My Account">Log out</a></li>
            <li><a href="references.php" title="My Account">Cite Help</a></li>
        </ul>
        </div>
    </nav>
</header>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-offset-3 ">
            <h1><?php echo $new . "'s to do list" ?></h1>
            <a class="btn btn-primary" href="todo_details.php?usernameID=0">
                <i class="fa fa-plus"></i> Add New Day</a>
            <br>
            <table class="table">
                <tr>
                    <th>Day</th>
                    <th>Username</th>
                    <th>Homework</th>
                    <th>Pet Care</th>
                    <th>Workout Time</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($todos as $todo) :?>
                    <tr>
                        <td><?php if ($daycount == 7){$daycount = 0;} echo $day[$daycount]; $counter = 0; $daycount ++; ?></td>
                        <td><?php
                            if ($todo['name'] == false)
                            {
                                $missing = true ;
                                echo "Missing";
                                $counter = $counter +1;
                            }
                            else
                            {
                                echo $todo['name'];
                            }
                            ?></td>
                        <td><?php
                            if ($todo['Homework'] == false)
                            {
                                $missing = true ;
                                echo "Missing";
                                $counter = $counter +1;
                            }
                            else
                            {
                                echo $todo['Homework'];
                            } ?></td>
                        <td><?php
                            if ($todo['feedPet'] == false)
                            {
                                $missing = true ;
                                echo "Missing";
                                $counter = $counter +1;
                            }
                            else
                            {
                                echo $todo['feedPet'];
                            } ?> </td>
                        <td><?php
                            if ($todo['workoutTime'] == false)
                            {
                                $missing = true ;
                                echo "Missing";
                                $counter = $counter +1;
                            }
                            else
                            {
                                echo $todo['workoutTime'];
                            }
                            ?></td>
                        <td>
                            <!-- Adds button to edit todos details and tracks how many are missing data  -->
                        <ul class="nav nav-pills" role="tablist">
                                <li role="presentation"><a href="todo_details.php?usernameID=<?php echo $todo['id'] ?>"><?php if ($missing== false)
                                        {
                                            echo "Completed";
                                            echo "<span class='badge'><span class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"></span></span></a>";
                                        }
                                        else {
                                            echo "Data missing";
                                            echo "<span class='badge'> $counter</span></a>";
                                        } ?>
                                </li>
                            </ul>
                        </td>
                        <td><?php

                            ?></td>
                        <td><a  class="btn btn-danger" href="todoDayDelete.php?usernameID=<?php echo $todo['id'] ?>" onclick="return confirm('Are you sure you want to delete it?')"><i class="fa fa-trash-o"></i> Delete</a></td>
                    </tr>
                <?php endforeach; ?>


            </table>

        </div>
    </div>
</div>



</body>
</html>