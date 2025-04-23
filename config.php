<?php

$host = 'mini-project.choiaoqiwfvv.us-east-1.rds.amazonaws.com';
$username = 'root';
$password = 'root1234';
$database = 'todoapp';

$conn = new mysqli( $host, $username, $password, $database );

if ( $conn->connect_error ) {
    die( 'Connection failed: ' . $conn->connect_error );
}
?>
