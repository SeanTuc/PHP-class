<?php
session_start();
include_once('database.php');
// grabs $_GET's and session variables
$_SESSION['tableID'];
$usernameID = $_GET["usernameID"];
$tableName = $_SESSION['tableID'];
$nameHolder = $_SESSION['userid'];

if($usernameID == 0) {
    //checking for valid username
    $todolist = null;
    $isEmpty = 1;
} else {
    $isEmpty = 0;
    $query = "SELECT * FROM $tableName WHERE id = '$usernameID' "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement

    $statement->execute();
    $todolist = $statement->fetch();
    $statement->closeCursor();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>contact Details</title>
    <!-- CSS Section -->

    <link rel="stylesheet" href="Scripts/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="Scripts/lib/bootstrap/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="Scripts/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="Content/app.css">



</head>
<header>
    <h1 style="text-align: center;">PHP Login </h1>
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


        <div class="col-md-offset-3 col-md-6">
            <h1><?php echo $nameHolder . "'s "; ?>To Do List</h1>

            <form action="todo_update.php" method="post">
                <table class="table">
                    <tr>
                        <th></th>
                        <th><div class="form-group">
                                <label for="IDTextField" hidden>Table ID</label>
                                <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                                       placeholder="contact ID" value="<?php echo $todolist['id']; ?>">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th> <?php if($isEmpty == 1 or $todolist['name']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th><div class="form-group">
                                <label for="nameTextField">User Name</label>
                                <input type="text" class="form-control" id="nameTextField"  name="nameTextField"
                                       placeholder="Contact Name" required  value="<?php echo $nameHolder; ?>">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th> <?php if($isEmpty == 1 or $todolist['Homework']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th><div class="form-group">
                                <label for="workNameTextField">Home Work</label>
                                <input type="text" class="form-control" id="workNameTextField"  name="workNameTextField"
                                       placeholder="Subject's homework that was completed"  value="<?php echo $todolist['Homework']; ?>">
                            </div></th>
                    </tr>
                    <tr>
                        <th>  <?php if($isEmpty == 1 or $todolist['feedPet']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th>
                            <div class="form-group">
                                <label for="petTextField">Pet Care</label>
                                <input type="text" class="form-control" id="petTextField" name="petTextField"
                                       placeholder="Amount of time spent with pet"   value="<?php echo $todolist['feedPet']; ?>">
                            </div></th>
                    </tr>
                    <tr>
                        <th>  <?php if($isEmpty == 1 or $todolist['workoutTime']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th>
                            <div class="form-group">
                                <label for="workoutTextField">Workout time</label>
                                <input type="text" class="form-control" id="workoutTextField" name="workoutTextField"
                                       placeholder="Amount of time worked out"  value="<?php echo $todolist['workoutTime']; ?>">
                            </div>
                        </th>
                    </tr>
                </table>
                <input type="hidden" name="isEmpty" value="<?php echo $isEmpty; ?>">
                <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>

            </form>


        </div>
    </div>
</div>


<!-- JavaScript Section -->
<script src="../Scripts/lib/jquery/dist/jquery.min.js"></script>
<script src="../Scripts/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../Scripts/app.js"></script>
</body>
</html>

