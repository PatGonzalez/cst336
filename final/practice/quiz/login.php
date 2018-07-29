<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Login</h1>
        <h2>Credentials required before submiting form.</h2>
        <p>You can log in using usernames <strong>user_1@csumb.edu</strong> </p>
        
        <!--Form to enter credentials-->
        <!--Lesson 3.1-->
    	<form method="post" action="verifyUser.php">
    		<input type="text" name="email" placeholder="email" /><br/>
    	
    		<input type="submit" name="submit" value="Login" />
    	</form>
	
    </body>
</html>