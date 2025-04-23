<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <form class="signup-form" action="signup.php" method="post">
            <h2>Sign Up</h2>
            <input class="signup-input" type="text" name="username" placeholder="Username" required>
            <input class="signup-input" type="password" name="password" placeholder="Password" required>
            <input class="signup-button" type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
</body>
</html>

<?php
include 'config.php';

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $username = $_POST[ 'username' ];
    $password = $_POST[ 'password' ];

    $hashed_password = password_hash( $password, PASSWORD_DEFAULT );

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ( $conn->query( $sql ) === TRUE ) {
        echo 'Sign up successful!';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}

$conn->close();
?>