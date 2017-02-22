<?php session_start();
session_destroy()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    Author: Sean Tucker
    Student #: 200352573
    File Name: login.php
    Description: login page
    -->
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Todo Login">
    <meta name="author" content="Sean Tucker #200352573">
    <title>Todo Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="app.css" type="text/css" >
</head>
<header>
    <h1 style="text-align: center;">Todo Tasks Login </h1>
    <nav class="navbar navbar">
        <div class="container">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="index.php" title="Home">Home</a></li>
                <li><a href="login.php" title="Login">Login</a></li>
                <li><a href="todo.php" title="My Account">My Tasks</a></li>
                <li><a href="logout.php" title="My Account">Log out</a></li>
                <li><a href="references.php" title="My Account">Cite References</a></li>
            </ul>
        </div>
    </nav>
</header>
<body> <p><strong>New User:</strong> input your desired username and password <br> <strong>Existing User:</strong> input your username and password</p>
<form action="createtable.php" method="post">
        <table class="table">
            <tr>
                <th><div class="form-group">
                        <label for="oldUser" hidden></label>
                        <!-- early validation for directing to create a new account page or login -->
                        <input type="hidden" class="form-control" id="existingUser" name="existingUser"
                               placeholder="existingUser" value="<?php echo '2'; ?>" >
                    </div>
                </th>
            </tr>
            <tr>
            <th><div class="form-group">
                    <label for="NameTextField">Username</label>
                    <input type="text" class="form-control" id="userTextField"  name="userTextField"
                           placeholder="Username" required >
                </div>
            </th>
            </tr>
            <tr>
                <th>
                    <div class="form-group">
                        <label for="NameTextField">Password</label>
                        <input type="text" class="form-control" id="passwordTextField"  name="passwordTextField"
                               placeholder="Password" required >
                    </div>
                </th>
            </tr>
        </table>
    <button type="submit" id="SubmitButton" class="btn btn-primary">Login</button>

</form>

</body>
</html>








