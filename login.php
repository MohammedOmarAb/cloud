<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="login-container">
        <form action="login.php" method="post" class="login-form">
            <h1 class="login-heading">Login</h1>
            <input type="text" name="username" placeholder="Username" required class="login-input">
            <input type="password" name="password" placeholder="Password" required class="login-input">
            <input type="submit" value="Login" class="login-button">
            <p class="login-text">Don't have an account? <a href="signup.php" class="login-link">Sign up</a></p>
        </form>
    </div>
</body>

</html>

<?php
include 'config.php';

session_start();

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $username = $_POST[ 'username' ];
    $password = $_POST[ 'password' ];

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $result = $conn->query( $sql );

    if ( $result->num_rows == 1 ) {
        $row = $result->fetch_assoc();
        if ( password_verify( $password, $row[ 'password' ] ) ) {
            $_SESSION[ 'user_id' ] = $row[ 'id' ];
            header( 'Location: index.php' );
            exit;
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'User not found';
    }
}

$conn->close();
?>