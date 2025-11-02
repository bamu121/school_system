<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple query (replace with hashed password check in real apps)
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['username'] = $username;

        // Set cookie if "Remember Me" is checked
        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + (86400 * 30), "/"); // 30 days
        }

        echo "Login successful!";
        // Redirect to dashboard or home page
    } else {
        echo "Invalid username or password.";
    }

    $conn->close();
}
?>
