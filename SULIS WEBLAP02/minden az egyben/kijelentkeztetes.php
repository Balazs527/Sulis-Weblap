<?php
session_start();

// Ellenőrizni kell, hogy a felhasználó be van-e jelentkezve, ha nincs, akkor átirányítjuk a bejelentkezési oldalra.
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Kijelentkeztetjük a felhasználót, töröljük a session változóit és átirányítjuk a kijelentkezési oldalra.
$_SESSION = array();
session_destroy();
header("location: logout.php");
exit;
?>
