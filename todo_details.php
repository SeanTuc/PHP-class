<?php
session_start();
include_once('database.php'); // include the database connection file
$_SESSION['tableID'];
$contactID = $_GET["contactID"]; // assigns the contactID from the URL
$tableName = $_SESSION['tableID'];
$nameHolder = $_SESSION['userid'];

if($contactID == 0) {
    $contact = null;
    $isEmpty = 1;
} else {
    $isEmpty = 0;
    $query = "SELECT * FROM $tableName WHERE id = '$contactID' "; // SQL statement
    $statement = $db->prepare($query); // encapsulate the sql statement

    $statement->execute(); // run on the db server
    $contact = $statement->fetch(); // returns only one record
    $statement->closeCursor(); // close the connection
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
                                <label for="IDTextField" hidden>contact ID</label>
                                <input type="hidden" class="form-control" id="IDTextField" name="IDTextField"
                                       placeholder="contact ID" value="<?php echo $contact['id']; ?>">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th> <?php if($isEmpty == 1 or $contact['name']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th><div class="form-group">
                                <label for="NameTextField">User Name</label>
                                <input type="text" class="form-control" id="NameTextField"  name="NameTextField"
                                       placeholder="contact Name" required  value="<?php echo $nameHolder; ?>">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th> <?php if($isEmpty == 1 or $contact['Homework']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th><div class="form-group">
                                <label for="lastNameTextField">Home Work</label>
                                <input type="text" class="form-control" id="lastNameTextField"  name="lastNameTextField"
                                       placeholder="Subjects homework that was completed"  value="<?php echo $contact['Homework']; ?>">
                            </div></th>
                    </tr>
                    <tr>
                        <th>  <?php if($isEmpty == 1 or $contact['feedPet']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th>
                            <div class="form-group">
                                <label for="emailTextField">Pet Care</label>
                                <input type="text" class="form-control" id="emailTextField" name="emailTextField"
                                       placeholder="Amount of time spent with pet"   value="<?php echo $contact['feedPet']; ?>">
                            </div></th>
                    </tr>
                    <tr>
                        <th>  <?php if($isEmpty == 1 or $contact['workoutTime']== null ){echo "<span class=' glyphicon glyphicon-play' aria-hidden='true'></span>";} else{ echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";}     ?></th>
                        <th>
                            <div class="form-group">
                                <label for="CostTextField">Workout time</label>
                                <input type="text" class="form-control" id="CostTextField" name="CostTextField"
                                       placeholder="Amount of time worked out"  value="<?php echo $contact['workoutTime']; ?>">
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

