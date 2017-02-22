<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    Author: Sean Tucker
    Student #: 200352573
    File Name: invalidUserName.php
    Description: page to display when password fails
    -->
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Login Failure">
    <meta name="author" content="Sean Tucker #200352573">
    <title>Login Fail</title>
    <!-- CSS -->
    <link rel="stylesheet" href="app.css" type="text/css" >
</head>
<header>
    <h1 style="text-align: center;">Login Failed </h1>
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
<body>
<h1> Error  </h1> <h2> Username or password do not match. </h2>
<p> Please enter the correct password or if you are making a new account please use a different username. </p>




</body>
</html>