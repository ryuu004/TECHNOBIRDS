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

    // Handle image upload
    if(isset($_FILES['image'])) {
        $user_id = $_SESSION['user_id']; 
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Update profile picture in the database
        $sql = "UPDATE users SET profile_picture = '$imgContent' WHERE id = $user_id"; 

        if ($conn->query($sql) === TRUE) {
            header('Location: /home?status_address=success_1');

            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Please select an image to upload.";
    }

    // Close connection
    $conn->close();
} else {
    echo "User not logged in.";
}
?>
