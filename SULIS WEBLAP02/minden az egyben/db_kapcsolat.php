<?php
// Az adatbázis kapcsolódás adatai
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db";

// Adatbázis kapcsolat létrehozása
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
