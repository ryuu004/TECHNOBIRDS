<?php
// Database configuration
$host = "localhost"; // or other host if your database isn't local
$username = "root"; // your database username
$password = ""; // your database password
$database = "webapps";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check what form was submitted
if (isset($_POST['fullName'])) {  // Assume registration form was submitted
    // Retrieve form data for registration
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['conpassword'];
    $gender = $conn->real_escape_string($_POST['gender']);

    // Check if passwords match
    if ($password !== $confirmPassword) {
        header('Location: /home?call_passN_match=yes');
        exit; // Stop the script if passwords do not match
    }

    // Hash the password before storing (for security)
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the users table
    $sql = "INSERT INTO users (full_name, username, email, phone_number, password, gender) VALUES ('$fullName', '$username', '$email', '$phoneNumber', '$passwordHashed', '$gender')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect to /home with status=success immediately
        header('Location: /home?status=success');
        exit(); // Ensure that script execution stops after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Delay for 2 seconds
    sleep(2);

    // Redirect to /home without status parameter after 2 seconds
    header('Location: /home');
    exit();

} elseif (isset($_POST['phoneNumber'])) {  // Assume login form was submitted
    // Retrieve form data for login
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $password = $_POST['password'];

    // SQL query to find the user by phone number
    $sql = "SELECT * FROM users WHERE phone_number = '$phoneNumber'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Check password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
           // Start session to use session variables
           session_start();
           $_SESSION['user_full_name'] = $row['full_name']; /* FULLNAME */
           $_SESSION['user_username'] = $row['username']; /* USERNAME */
           $_SESSION['user_email'] = $row['email']; /* EMAIL */
           $_SESSION['user_phone_number'] = $row['phone_number']; /* PHONE NUMBER */
           $_SESSION['user_gender'] = $row['gender']; /* GENDER */
           $_SESSION['user_profile_picture'] = $row['profile_picture']; /* PROFILE PICTURE */
           $_SESSION['user_id'] = $row['id']; /* ID */
           $_SESSION['user_address'] = $row['address']; /* ADDRESS */
           echo $_SESSION['user_address'];

           $_SESSION['loggedin'] = true;  // Set logged in status to true        
        
           // Redirect to ecommerce homepage
           header('Location: /home');
           exit;
           
        } else {
            // Wrong password
            session_start();
            $_SESSION['loggedin'] = false; 
            header('Location: /home?call_wrongpass=yes');
        }

    } else {

        // No phone number
        session_start();
        header('Location: /home?call_invalid=yes');
        $_SESSION['loggedin'] = false;

    }
    
}

// Close connection
$conn->close();
?>