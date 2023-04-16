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

// Adatok ellenőrzése
if (empty($username)) {
    $errors[] = "Felhasználónév megadása kötelező!";
    }
    if (empty($email)) {
    $errors[] = "E-mail cím megadása kötelező!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Érvénytelen e-mail cím formátum!";
    }
    if (empty($password)) {
    $errors[] = "Jelszó megadása kötelező!";
    } elseif (strlen($password) < 6) {
    $errors[] = "A jelszó túl rövid! Minimum 6 karakter szükséges.";
    }
    if (empty($confirm_password)) {
    $errors[] = "Jelszó megerősítése kötelező!";
    } elseif ($password != $confirm_password) {
    $errors[] = "A megadott jelszavak nem egyeznek!";
    }
    
    // Ha nincsenek hibák, elmentjük az adatokat az adatbázisba
    if (empty($errors)) {
    // Adatbáziskapcsolat létrehozása és adatok mentése
    $db = new mysqli('localhost', 'felhasznalonev', 'jelszo', 'db');
    if ($db->connect_error) {
    die("Hiba az adatbáziskapcsolat létrehozásakor: " . $db->connect_error);
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    if (!$db->query($query)) {
    die("Hiba az adatok mentésekor: " . $db->error);
    }
    $db->close();
    // Átirányítás a sikeres regisztráció oldalra
header('Location: registration_success.php');
exit();