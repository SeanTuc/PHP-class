<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Assignment  One</title>
        <link rel="stylesheet" href="../app.css" type="text/css" />
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
                        
                            <label for="user">Phone Number</label>
                            <input type="text" name="phoneNumber" id="phoneNumber" required size="25" maxlength="25" placeholder="Phone Number" />
                        
                            <label for="email">Email address</label>
                            <input id="email" type="email" name="email" placeholder="email@hotmail.com" />

                            <a class="btn btn-primary" href="addContact.php"> Add Contact</a>
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