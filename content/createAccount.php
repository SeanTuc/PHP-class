<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Assignment  One</title>
        <link rel="stylesheet" href="app.css" type="text/css" />
	</head>
        <header>
            <h1>PHP Login</h1>
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
		<main>
            <fieldset>
                    <div>
                        <form action="myAccount.php" method="post">
                            
                            <label for="fname">First Name</label>
                            <input type="text" name="fname" id="fname" required size="25" maxlength="50" placeholder="First Name" /> 
                        
                            <label for="lname">Last Name</label>
                            <input type="text" name="lname" id="lname" required size="25" maxlength="50" placeholder="Last Name" /> 
                        
                            <label for="user">User Name</label>
                            <input type="text" name="user" id="user" required size="25" maxlength="50" placeholder="User Name" /> 
                        
                            <label for="email">Email address</label>
                            <input id="email" type="email" name="email" placeholder="email@hotmail.com" />
                        
                            <label for="password">Password</label>
                            <input id="password" type="password" name="password" />
                        
                            <label for="New password">Retype Password</label>
                            <input id="New password" type="password" name="New password" />
                            
                            <input type="submit" name="submit" value="Create Account"/>
                        </form>
                    </div>       
                </fieldset>
            </form>
        </main>
        <footer>
            <p><small>PHP Login</small></p>
        </footer>
	</body>
</html>