<?php 
    $host = 'localhost'; // Database host
    $password = ''; // Database password
    $user = 'root'; // Database user
    $dbname = 'todoapp'; // Database name

    $conn = mysqli_connect($host, $user, $password, $dbname); // Create connection

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error()); // Display error message if connection fails
    } else {
        echo "Connected successfully"; // Uncomment for debugging
    }
?>