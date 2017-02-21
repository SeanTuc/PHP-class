<?php session_start();
session_destroy()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Assignment One</title>
    <link rel="stylesheet" href="app.css" type="text/css" >
</head>
<header>
    <h1 style="text-align: center;">PHP Login </h1>
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
<body> <p><strong>New User:</strong> input your desired username and password <br> <strong>Existing User:</strong> input your username and password</p>
<form action="createtable.php" method="post">
        <table class="table">
            <tr>
                <th><div class="form-group">
                        <label for="oldUser" hidden>Login</label>
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
    <button type="submit" id="SubmitButton" class="btn btn-primary">Submit</button>

</form>

</body>
</html>








