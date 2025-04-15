<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];  // Plain text password

    // Use MD5 encryption (not secure but better than plain text)
    $password_md5 = md5($password);  

    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password_md5);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['access'] = $user['access'];

        if ($user['access'] == 'User') {
            header("Location: dashboard.php");
        } else {
            header("Location: admin/admin-dashboard.php");
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>
