<?php
include 'config.php';

session_start();

if ( !isset( $_SESSION[ 'user_id' ] ) ) {
    header( 'Location: login.php' );
    exit;
}

$user_id = $_SESSION[ 'user_id' ];

// Fetch todos for the logged-in user
$sql = "SELECT * FROM todos WHERE user_id=$user_id";
$result = $conn->query( $sql );
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<title>Todo List</title>
<link rel = 'stylesheet' href = 'styles.css'>
</head>

<body>
<div class = 'container'>
<h1>Todo List</h1>
<ul>
<?php
// Check if there are any todos
if ( $result->num_rows > 0 ) {
    // Loop through each todo and display it
    while ( $row = $result->fetch_assoc() ) {
        echo '<li>';
        echo '<strong>' . $row[ 'title' ] . '</strong>';
        echo '<div>' . $row[ 'description' ] . '</div>';
        echo "<a href='edit.php?id=" . $row[ 'id' ] . "' class='edit'>Edit</a>";
        echo "<a href='delete.php?id=" . $row[ 'id' ] . "' class='delete'>Delete</a>";
        echo '</li>';
    }
} else {
    echo '<li>No todos found.</li>';
}
?>
</ul>
<a href = 'add.php' class = 'add-link'>Add New Todo</a>
<p><a href = 'logout.php' class = 'logout'>Logout</a></p>
</div>
</body>

</html>
