<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="lapiz">
    <?php
	// Initialize variables
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";

	// Check if form is submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Check username
		if (empty(trim($_POST["username"]))) {
			$username_err = "Please enter a username.";
		} else {
			$username = trim($_POST["username"]);
		}

		// Check password
		if (empty(trim($_POST["password"]))) {
			$password_err = "Please enter a password.";
		} else {
			$password = trim($_POST["password"]);
		}

		// Check confirm password
		if (empty(trim($_POST["confirm_password"]))) {
			$confirm_password_err = "Please confirm password.";
		} else {
			$confirm_password = trim($_POST["confirm_password"]);
			if ($password != $confirm_password) {
				$confirm_password_err = "Password does not match. Try again.";
			}
		}

		// If no errors, store data into database
		if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
			// Connect to database
			$servername = "localhost";
			$db_username = "your_db_username";
			$db_password = "your_db_password";
			$dbname = "your_db_name";
			$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

			// Insert user data into database
			$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
			if ($stmt = mysqli_prepare($conn, $sql)) {
				mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT);
				if (mysqli_stmt_execute($stmt)) {
					header("location: login.php");
				} else {
					echo "Something went wrong. Please try again later.";
				}
			}
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
		}
	}
	?>
    <nav>
        <ul>
          <li><a href="index.html">About</a></li>
          <li><a href="#">Dashboard</a></li>
          <li class="active"><a href="#">Login</a></li>
        </ul>
    </nav>
	<h2 class="redBack">Login</h2>
	<form action="login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username" required>
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" required>
		<br>
		<input type="submit" value="Login" href="dashboard.html">
	</form>

	<h2 class="redBack">New? Register here!</h2>
	<form action="login.php" method="post">
		<label for="username">Username:</label>
		<input type="text" name="username" required>
		<?php if (!empty($username_err)) { echo "<div class='error'>" . $username_err . "</div>"; } ?>
		<br>
		<label for="password">Password:</label>
		<input type="password" name="password" required>
		<?php if (!empty($password_err)) { echo "<div class='error'>" . $password_err . "</div>"; } ?>
		<br>
		<label for="confirm_password">Confirm Password:</label>
		<input type="password" name="confirm_password" required>
		<?php if (!empty($confirm_password_err)) { echo "<div class ='error'>" . $confirm_password_err . "</div>"; } ?>
        <br>
		<input type="submit" value="Register">
	</form>
</body>
</html>