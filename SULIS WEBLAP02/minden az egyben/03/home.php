<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if (isset($_POST['login'])) {
    loginUser($conn);
} elseif (isset($_POST['register'])) {
    registerUser($conn);
} elseif (isset($_GET['action']) && $_GET['action'] == 'logout') {
    if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
        setcookie('username', '', time() - 3600);
        setcookie('password', '', time() - 3600);
    }
    session_destroy();
    header("Location: index.html");
    exit();
} elseif (isset($_SESSION['username'])) {
    displayHomePage();
} else {
    header("Location: index.html");
    exit();
}

function loginUser($conn) {
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $hashed_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;

        if (isset($_POST['remember_me'])) {
            setcookie('username', $username, time() + (86400 * 30), '/');
            setcookie('password', $hashed_password, time() + (86400 * 30), '/');
        }

        displayHomePage();
    } else {
        echo "Invalid username or password.";
    }
}

function registerUser($conn) {
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $confirm_password = sanitizeInput($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        return;
    }

    $hashed_password = hash('sha256', $password);
    $role = 'user';

    $sql = "INSERT INTO users (firstname, lastname, username, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $firstname, $lastname, $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        displayHomePage();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function displayHomePage() {
    $username = $_SESSION['username'];
    echo "Welcome, " . $username . "! You are now logged in.";
    echo "<br><a href='home.php?action=logout'>Logout</a>";
}

$conn->close();
?>
