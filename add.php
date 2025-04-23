<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Todo</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="add-container">
        <h2 class="add-heading">Add New Todo</h2>
        <form action="add.php" method="post" class="add-form">
            <input type="text" name="title" placeholder="Title" class="add-input" required>
            <textarea name="description" placeholder="Description" class="add-input" required></textarea>
            <input type="submit" value="Add Todo" class="add-button">
        </form>
    </div>
</body>

</html>

<?php
include 'config.php';

session_start();

if ( !isset( $_SESSION[ 'user_id' ] ) ) {
    header( 'Location: login.php' );
    exit;
}

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $title = $_POST[ 'title' ];
    $description = $_POST[ 'description' ];
    $user_id = $_SESSION[ 'user_id' ];

    $sql = "INSERT INTO todos (user_id, title, description) VALUES ('$user_id', '$title', '$description')";

    if ( $conn->query( $sql ) === TRUE ) {
        header( 'Location: index.php' );
        exit;
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}

$conn->close();
?>

