<?php
// Connect to the database
$servername = "localhost";
$db_username = "ssmalley1";
$db_password = "ssmalley1";
$dbname = "ssmalley1";
$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

// Check if the properties table exists
$sql = "SELECT 1 FROM properties LIMIT 1";
$result = mysqli_query($conn, $sql);

// If the table does not exist, create it
if (!$result) {
    $sql = "CREATE TABLE properties (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        location VARCHAR(255) NOT NULL,
        age INT(6) NOT NULL,
        floor_plan VARCHAR(255) NOT NULL,
        square_footage INT(6) NOT NULL,
        num_bedrooms INT(2) NOT NULL,
        facilities VARCHAR(255) NOT NULL,
        garden TINYINT(1) NOT NULL,
        parking TINYINT(1) NOT NULL,
        proximity VARCHAR(255) NOT NULL,
        main_roads VARCHAR(255) NOT NULL,
        value INT(10) NOT NULL,
        img_data BLOB NOT NULL
    )";
    mysqli_query($conn, $sql);
}

// Get the property information from the form
$location = $_POST["location"];
$age = $_POST["age"];
$floor_plan = $_POST["floor_plan"];
$square_footage = $_POST["square_footage"];
$num_bedrooms = $_POST["num_bedrooms"];
$facilities = $_POST["facilities"];
$garden = isset($_POST["garden"]) ? 1 : 0;
$parking = isset($_POST["parking"]) ? 1 : 0;
$proximity = $_POST["proximity"];
$main_roads = $_POST["main_roads"];
$value = $_POST["value"];

// Get the image data from the uploaded file
$img_data = addslashes(file_get_contents($_FILES['img']['tmp_name']));

// Insert the new property into the database
$sql = "INSERT INTO properties (location, age, floor_plan, square_footage, num_bedrooms, facilities, garden, parking, proximity, main_roads, value, img_data)
VALUES ('$location', '$age', '$floor_plan', '$square_footage', '$num_bedrooms', '$facilities', '$garden', '$parking', '$proximity', '$main_roads', '$value', '$img_data')";
$result = mysqli_query($conn, $sql);

// Check if the property was successfully added
if ($result) {
    header("Location: dashboard.php");
} else {
    echo "Error adding property: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
