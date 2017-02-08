<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Assignment  One</title>
        <link rel="stylesheet" href="app.css" type="text/css" />
	</head>
        <header>
			<?php
				$userName = "Admin";
				$password = "Admin";
				$validate = false;
				if (($_POST["name"] == $userName) && ($_POST["password"] == $password))
					{echo "<h1>Logged In Succesful</h1>";
					$validate = true;}
				else 
				{echo "<h1>Logged In Not Succesful</h1>";}

			?>
			<nav id="global">
				<ul>
                    <li><a href="../index.html" title="Home">Home</a></li>
					<li><a href="createAccount.php" title="Create Account">Create Account</a></li>
					<li><a href="login.php" title="Login">Login</a></li>
					<li><?php
                        if ($validate == true)
                        {echo "<a href=\"myAccount\" title=\"My Account\">My Account</a>";}
                        else
                        {echo "<a href=\"login.php\" title=\"Login\">Login</a></li>";}
                        ?></li>
				</ul>
			</nav>
        </header>
        <body>
			<p> 
        		<?php
				if ($validate == true)
					{ echo "Welcome ";
            		echo $_POST["name"];}


				else
					{echo "please retry login";}
        		?> 
			</p>
        </body>
</html>


--  , cd:/directory ,   status   , git add .   , git commit   (i = able to type) esc  then :wq  git remote push  <add name> <add url>