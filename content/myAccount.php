
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Assignment One</title>
        <link rel="stylesheet" href="app.css" type="text/css" />
	</head>
        <header>
            <h1>PHP  Login</h1>
			<nav id="global">
				<ul>
                    <li><a href="../index.html" title="Home">Home</a></li>
					<li><a href="createAccount.php" title="Create Account">Create Account</a></li>
					<li><a href="login.php" title="Login">Login</a></li>
					<li><a href="myAccount.php" title="My Account">My Account</a></li>
				</ul>
			</nav>
        </header>
        <body>
			<p> 
        		<?php
					echo "Welcome ";
            		echo $_POST["fname"];
					echo " ";
					echo $_POST["lname"];
					echo "<br> Your user name is: ".$_POST["user"].".<br>";
					echo "Your new account has been made. A confirmation email has been sent to: " .$_POST["email"].".";
        		?> 
			</p>

        </body>
</html>


