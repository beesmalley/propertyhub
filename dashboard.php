<!DOCTYPE html>
<html>
<head>
	<title>Property Dashboard</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Property Dashboard</h1>

	<!-- Display all available properties -->
	<?php
		// Connect to the database
		$host = "localhost";
		$user = "ssmalley1";
		$password = "ssmalley1";
		$dbname = "ssmalley1";
		$conn = mysqli_connect($host, $user, $password, $dbname);

		// Retrieve all properties from the database
		$sql = "SELECT * FROM properties";
		$result = mysqli_query($conn, $sql);

		// Loop through each property and display it as a card
		while ($row = mysqli_fetch_assoc($result)) {
			$location = $row["location"];
			$age = $row["age"];
			$floor_plan = $row["floor_plan"];
			$square_footage = $row["square_footage"];
			$num_bedrooms = $row["num_bedrooms"];
			$facilities = $row["facilities"];
			$garden = $row["garden"];
			$parking = $row["parking"];
			$proximity = $row["proximity"];
			$main_roads = $row["main_roads"];
			$value = $row["value"];
			$property_tax = $value * 0.07;
			?>

			<div class="card">
				<h2><?php echo $location; ?></h2>
				<p>Age: <?php echo $age; ?></p>
				<p>Floor Plan: <?php echo $floor_plan; ?> (<?php echo $square_footage; ?> sq ft)</p>
				<p>Bedrooms: <?php echo $num_bedrooms; ?></p>
				<p>Facilities: <?php echo $facilities; ?></p>
				<p>Garden: <?php echo $garden; ?></p>
				<p>Parking: <?php echo $parking; ?></p>
				<p>Proximity: <?php echo $proximity; ?></p>
				<p>Main Roads: <?php echo $main_roads; ?></p>
				<p class="property-tax">Property Tax: $<?php echo $property_tax; ?></p>
			</div>

			<?php
	}

	// Close the database connection
	mysqli_close($conn);
?>

<!-- Form to add a new property -->
<h2>Add New Property</h2>
<form action="add_property.php" method="post">
	<label for="location">Location:</label>
	<input type="text" name="location" required><br>

	<label for="age">Age:</label>
	<input type="number" name="age" required><br>

	<label for="floor_plan">Floor Plan:</label>
	<input type="text" name="floor_plan" required><br>

	<label for="square_footage">Square Footage:</label>
	<input type="number" name="square_footage" required><br>

	<label for="num_bedrooms">Number of Bedrooms:</label>
	<input type="number" name="num_bedrooms" required><br>

	<label for="facilities">Facilities:</label>
	<input type="text" name="facilities" required><br>

	<label for="garden">Garden:</label>
	<input type="checkbox" name="garden"><br>

	<label for="parking">Parking:</label>
	<input type="checkbox" name="parking"><br>

	<label for="proximity">Proximity to Nearby Facilities:</label>
	<input type="text" name="proximity" required><br>

	<label for="main_roads">Proximity to Main Roads:</label>
	<input type="text" name="main_roads" required><br>

	<label for="value">Value:</label>
	<input type="number" name="value" required><br>

	<input type="submit" value="Add Property">
</form>

