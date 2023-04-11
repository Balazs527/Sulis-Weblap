<?php
// Adatbázis kapcsolódás
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Hibaellenőrzés
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Bejelentkezési adatok ellenőrzése
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Sikeres bejelentkezés
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        // Sikertelen bejelentkezés
        echo "Hibás felhasználónév vagy jelszó!";
    }
}

$conn->close();
?>
