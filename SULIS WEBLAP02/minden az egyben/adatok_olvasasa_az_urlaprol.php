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

// POST adatok beolvasása
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$website = $_POST['website'];

// TODO: adatok ellenőrzése és elmentése az adatbázisba

?>
