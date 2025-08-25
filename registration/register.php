<?php
// Include database configuration
require_once 'dbconfig.php';

// Initialize variables to store user input
$firstName = $lastName = $userType = $dob = $indexNo = $email = $password = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $firstName = sanitizeInput($_POST['firstName']);
    $lastName = sanitizeInput($_POST['lastName']);
    $userType = sanitizeInput($_POST['userType']);
    $dob = sanitizeInput($_POST['dob']);
    $indexNo = sanitizeInput($_POST['indexNo']);
    $email = sanitizeInput($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert user data into database
    $sql = "INSERT INTO users (first_name, last_name, user_type, dob, index_no, email, password)
            VALUES ('$firstName', '$lastName', '$userType', '$dob', '$indexNo', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful!"); window.location.href = "../login/login.html";</script>';
    } else {
        echo '<script>alert("Error: Could not register. Please try again.");</script>';
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close database connection
mysqli_close($conn);
?>
