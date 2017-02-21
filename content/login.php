<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Assignment One</title>
        <link rel="stylesheet" href="../app.css" type="text/css" />
	</head>
        <header>
            <h1>PHP Login </h1>
			<nav id="global">
				<ul>
                    <li><a href="../index.html" title="Home">Home</a></li>
					<li><a href="createAccount.php" title="Create Account">Create Account</a></li>
					<li><a href="login.php" title="Login">Login</a></li>
					<li><a href="login.php" title="My Account">My Account</a></li>
				</ul>
			</nav>
        </header>
        <body>
		<form action="first.php" method="post">
			<p> Name: <input type="text" 
			name="name"/> </p>
			<p> Password<input type="text" name="password"/></p>
			<p><input type="submit" name="submit" value="Submit"/></p>
		</form>

        </body>
</html>
