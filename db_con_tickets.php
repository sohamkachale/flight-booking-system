<?php
$servername = "localhost";
$username = "root"; // or your DB user
$password = "soham28";     // or your DB password
$database = "indigo_users";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
