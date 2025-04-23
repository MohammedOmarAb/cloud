<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Todo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="delete-container">
        <h2 class="delete-heading">Delete Todo</h2>
        <div class="delete-confirmation">
            <p class="delete-message">Are you sure you want to delete this todo?</p>
            <a href="delete.php?id=<?php echo $id; ?>&confirm=true" class="delete-link">Yes, delete it</a> |
            <a href="index.php" class="delete-link">No, go back</a>
        </div>
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

$id = $_GET[ 'id' ];

$sql = "DELETE FROM todos WHERE id=$id";

if ( $conn->query( $sql ) === TRUE ) {
    header( 'Location: index.php' );
    exit;
} else {
    echo 'Error: ' . $sql . '<br>' . $conn->error;
}

$conn->close();
?>
