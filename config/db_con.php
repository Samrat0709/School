<?php
// Database configuration
$hostname = 'localhost';
$port = '3307'; // Change to the appropriate MySQL port
$database = 'school';
$username = 'root';
$password = '';

// Create a database connection
$con = new mysqli($hostname, $username, $password, $database, $port);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


// You can use the $mysqli object for your database queries

?>