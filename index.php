<?php
// Replace these values with your Azure SQL database credentials
$server = "tcp:task1901.database.windows.net,1433";
$username = "sqladmin";
$password = "@Parth4!!0108";
$database = "task1901";

// Establishes the connection
$connectionOptions = array(
    "Database" => $database,
    "Uid" => $username,
    "PWD" => $password
);
$conn = sqlsrv_connect($server, $connectionOptions);

// Check the connection
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the data from the form
    $enteredData = $_POST["entered_data"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO formdetails (Name) VALUES (?)";
    $params = array($enteredData);
    $stmt = sqlsrv_query($conn, $sql, $params);

    // Check if the query was successful
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    echo "Data successfully inserted into the database.";
}

// Close the connection
sqlsrv_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="entered_data">Enter Data:</label>
        <input type="text" name="entered_data" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
