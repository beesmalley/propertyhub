<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

    <nav>
        <ul>
          <li><a href="index.php">About</a></li>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="active"><a href="#">Login</a></li>
		  <?php if($is_logged_in){ ?>
			<li class="loggedin"><?php print "Logged in as: ".$_SESSION["user_id"] ?></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php } ?>
        </ul>
    </nav>
	<div id="login">
		<h2 class="redBack">Login</h2>
		<form action="login-submit.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" required>
			<br>
			<label for="password">Password:</label>
			<input type="password" name="password" required>
			<br>
			<input type="submit" value="Login" href="dashboard.html">
		</form>
	</div>
	<div id="reg">
		<h2 class="redBack">New? Register here!</h2>
		<form action="register-submit.php" method="post">
			<label for="username">Username:</label>
			<input type="text" name="username" required>
			<br>
			<label for="password">Password:</label>
			<input type="password" name="password" required>
			<br>
			<label for="confirm_password">Confirm Password:</label>
			<input type="password" name="confirm_password" required>
			<br>
			<input type="submit" value="Register">
		</form>
	</div>
</body>
</html>