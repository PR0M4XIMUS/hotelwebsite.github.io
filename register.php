<?php
// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Database connection parameters
$host = "localhost";
$port = "5432";
$dbname = "HotelDB";
$user = "postgres";
$password = "postgres";

// Connect to the database
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
  echo "Failed to connect to database";
  exit;
}

// Insert data into the register table
$query = "INSERT INTO register (username, password, email) VALUES ('$username', '$password', '$email')";

$result = pg_query($conn, $query);
header("Location: index.html");

if (!$result) {
  echo "Failed to insert data into database";
  exit;
}

// Close the database connection
pg_close($conn);
?>
