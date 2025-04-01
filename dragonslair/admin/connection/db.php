<?php
$servername = "localhost";
$username = "root";
$password = ""; // Assuming you don't have a password set for your MySQL database
$database = "WEBP3";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    //echo "Connected successfully"; // Optional message to confirm successful connection
}
?>