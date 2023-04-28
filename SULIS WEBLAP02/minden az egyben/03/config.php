<?php

// Replace the placeholders with your actual database credentials
$servername = "localhost";
$username = "teszt";
$password = "k76-hf)J-Ty@/YrG";
$dbname = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>