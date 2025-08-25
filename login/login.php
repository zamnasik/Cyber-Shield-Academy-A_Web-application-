<?php
// Include database configuration
require_once 'dbconfig.php';

// Initialize variables to store user input
$email = $password = $userType = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];
    $userType = sanitizeInput($_POST['userType']);

    // Retrieve user data from database
    $sql = "SELECT * FROM users WHERE email='$email' AND user_type='$userType'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session and redirect
            session_start();
            $_SESSION['user'] = $user;

            if ($userType == 'student') {
                header("Location: ../student/student.html");
            } else if ($userType == 'admin') {
                header("Location: ../admin/admin.php");
            }
            exit();
        } else {
            echo '<script>alert("Incorrect password. Please try again.");</script>';
        }
    } else {
        echo '<script>alert("No user found with the provided email and user type.");</script>';
    }
}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
