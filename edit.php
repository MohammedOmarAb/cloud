<?php
include 'config.php';

session_start();

if ( !isset( $_SESSION[ 'user_id' ] ) ) {
    header( 'Location: login.php' );
    exit;
}

$id = $_GET[ 'id' ];

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    $title = $_POST[ 'title' ];
    $description = $_POST[ 'description' ];

    $sql = "UPDATE todos SET title='$title', description='$description' WHERE id=$id";

    if ( $conn->query( $sql ) === TRUE ) {
        header( 'Location: index.php' );
        exit;
    } else {
        echo 'Error updating record: ' . $conn->error;
    }
} else {
    $sql = "SELECT * FROM todos WHERE id=$id";
    $result = $conn->query( $sql );
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Todo</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="edit-container">
        <h2 class="edit-heading">Edit Todo</h2>
        <form action="edit.php?id=<?php echo $id; ?>" method='post' class="edit-form">
            <input type='text' name='title' placeholder='Title' value="<?php echo $row['title']; ?>" class="edit-input" required>
            <textarea name='description' placeholder='Description' class="edit-input" required><?php echo $row['description']; ?></textarea>
            <input type='submit' value='Update Todo' class="edit-button">
        </form>
    </div>
</body>

</html>
