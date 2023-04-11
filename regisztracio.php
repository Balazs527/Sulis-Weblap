<?php
// Adatbázis kapcsolat beállítása
$servername = "localhost";
$username = "felhasznalo";
$password = "jelszo";
$dbname = "adatbazis";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("A kapcsolat nem sikerült: " . $conn->connect_error);
}

// Űrlap adatok ellenőrzése és adatbázisba való mentése
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$confirm_password = $_POST["confirm_password"];

	if ($password != $confirm_password) {
		echo "A jelszavak nem egyeznek!";
	} else {
		$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

		if ($conn->query($sql) === TRUE) {
			echo "Sikeres regisztráció!";
		} else {
			echo "Hiba: " . $sql . "<br>" . $conn->error;
		}
	}
}

$conn->close();
?>