<?php
// Start the session to access session variables
session_start();

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Database configuration
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "webapps";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle address update
    if(isset($_POST['address'])) {
        $user_id = $_SESSION['user_id']; 
        $address = $_POST['address'];

        // Set address value based on whether it's empty or not
        $address_value = !empty($address) ? "'" . $conn->real_escape_string($address) . "'" : "'db_getAddress'";


        // Update address in the database
        $sql = "UPDATE users SET address = $address_value WHERE id = $user_id"; 

        if ($conn->query($sql) === TRUE) {
            if (!empty($address)) {
                header('Location: /home?status_address=success_1');
            } else {
                header('Location: /home?status_address=success_1');
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
} else {
    echo "User not logged in.";
}
?>
