<!-- HTML code -->

<!DOCTYPE html>
<html>
<head>
	<title>Table with Image</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
		img {
			max-width: 100px;
			height: auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Table with Image</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Phone</th>
					<th>Game ID</th>
					<th>Product</th>
					<th>Password</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				// Connect to the database
				$conn = mysqli_connect("localhost", "root", "", "demoo");

				// Check connection
				if (!$conn) {
				    die("Connection failed: " . mysqli_connect_error());
				}

				// Query the database
				$sql = "SELECT * FROM demo";
				$result = mysqli_query($conn, $sql);

				// Loop through the results and display them in the table
				if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) {
				        echo "<tr>";
				        echo "<td>" . $row["id"] . "</td>";
				        echo "<td>" . $row["phone"] . "</td>";
				        echo "<td>" . $row["game_id"] . "</td>";
				        echo "<td>" . $row["product"] . "</td>";
				        echo "<td>" . $row["password"] . "</td>";
				        echo "<td><img src='" . $row["image"] . "' alt='" . $row["product"] . "'></td>";
				        echo "</tr>";
				    }
				} else {
				    echo "0 results";
				}

				// Close the database connection
				mysqli_close($conn);
				?>
			</tbody>
		</table>
	</div>

	<!-- Include Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
