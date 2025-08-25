<?php
$servername = "localhost";
$username = "root";
$password = ""; // Use your MySQL password here
$dbname = "cybershield_db"; // The name of the database you created

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
