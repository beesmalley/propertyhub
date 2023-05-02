<?php
// Connect to the database
// Connect to the database
define('DB_NAME', 'ssmalley1');
define('DB_USER', 'ssmalley1');
define('DB_PASSWORD', 'ssmalley1');
define('DB_HOST', 'localhost');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$username = $_POST["username"];
$password = $_POST["password"];
 // Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// Check if employees table exists, if not create the table
if(mysqli_query($conn, "DESCRIBE users")) {
    // Table exists, insert data into it
    $sql = "INSERT INTO users (username, password)
            VALUES ('$username','$hashed_password')";
    if (mysqli_query($conn, $sql)) {
        session_start();
        $_SESSION["user_id"]=$username;
        header("Location: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Table does not exist, create the table and insert data
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL
        )";

    if (mysqli_query($conn, $sql)) {
        echo "Table employees created successfully. ";
         // Table exists, insert data into it
        $sql = "INSERT INTO users (username, password)
        VALUES ('$username','$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            session_start();
            $_SESSION["user_id"]=$username;
            header("Location: dashboard.php");
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}
?>