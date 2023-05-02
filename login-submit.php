<?php
// Connect to the database
$host = "localhost";
$user = "ssmalley1";
$password = "ssmalley1";
$dbname = "ssmalley1";
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the username and password from the form
$username = $_POST["username"];
$password = $_POST["password"];

// Query the database for the user
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

// Check if the user exists
if (mysqli_num_rows($result) == 1) {
    // Get the user's information
    $row = mysqli_fetch_assoc($result);
    $db_password = $row["password"];

    // Verify the password
    if (password_verify($password, $db_password)) {
        // Start the session and redirect to the dashboard
        session_start();
        $_SESSION["user_id"] = $username;
        header("Location: dashboard.php");
    } else {
        echo "<p class='error'>Invalid password.</p>";
    }
} else {
    echo "<p class='error'>No user known by that username.</p>";
}

// Close the database connection
mysqli_close($conn);
?>