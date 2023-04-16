<?php
$servername = "localhost"; // Adatbázis szerver neve
$username = "felhasznalonev"; // Adatbázis felhasználó neve
$password = "jelszo"; // Adatbázis felhasználó jelszava
$dbname = "db"; // Az adatbázis neve

// Csatlakozás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrizzük a kapcsolatot
if ($conn->connect_error) {
    die("Csatlakozás sikertelen: " . $conn->connect_error);
}

echo "Sikeres csatlakozás az adatbázishoz.";
?>