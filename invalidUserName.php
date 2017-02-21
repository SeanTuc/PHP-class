<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Todo List</title>
    <link rel="stylesheet" href="app.css" type="text/css" >
</head>
<header>
    <h1 style="text-align: center;">Login Failed </h1>
    <nav class="navbar navbar">
        <div class="container">
            <ul class="nav nav-tabs nav-justified">
                <li><a href="index.php" title="Home">Home</a></li>
                <li><a href="login.php" title="Login">Login</a></li>
                <li><a href="todo.php" title="My Account">My Account</a></li>
                <li><a href="logout.php" title="My Account">Log out</a></li>
            </ul>
        </div>
    </nav>
</header>
<body>
<h1> Error  </h1> <h2> Username or password do not match. </h2>
<p> Please enter the correct password or if you are making a new account please use a different username. </p>




</body>
</html>