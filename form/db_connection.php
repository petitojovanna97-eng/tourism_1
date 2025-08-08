<?php
    $servername = "localhost";      // always localhost for XAMPP
    $username = "root";             // default user in XAMPP
    $password = "";                 // leave blank for XAMPP
    $database = "tourismdestination_db";  // your actual DB name
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Optional: show message for testing
    // echo "Connected successfully";
?>