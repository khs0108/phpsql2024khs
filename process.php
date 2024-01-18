<?php
// Connect to your database
$servername = "demotask1801-server.database.windows.net";
$username = "demotask1801-server-admin";
$password = "CY867AL6B3O2372W$";
$dbname = "demotask1801-database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the data from the form
$data = $_POST['data'];

// Prepare the SQL statement
$sql = "INSERT INTO formdetails (data_column) VALUES (?)";
$stmt = $conn->prepare($sql);

// Bind the data to the prepared statement
$stmt->bind_param("s", $data);

// Execute the statement
$stmt->execute();

// Close the statement and connection
$stmt->close();
$conn->close();

// Display a success message
echo "Data submitted successfully!";
?>
