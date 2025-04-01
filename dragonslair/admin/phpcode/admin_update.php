<?php
session_start(); // Start session to access user ID
include('../connection/db.php'); // Include database connection

$admin_id = $_SESSION['id']; // Get the admin ID from session

// Fetch current user data
$query = "SELECT * FROM admin_login WHERE id = '$admin_id'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result);
if (!$user) {
    die("No user found with the given ID.");
}

// Check if the admin type is superadmin
if ($user['admin_type'] !== 'admin') {
    die("Unauthorized access: You are not an admin.");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if password is being updated
    $password = $_POST['pass'];
    if (!empty($password)) {
        $hashed_password = password_hash(mysqli_real_escape_string($conn, $password), PASSWORD_DEFAULT);
        $sql = "UPDATE admin_login SET admin_email = '$email', admin_pass = '$hashed_password', admin_username = '$username', first_name = '$firstname', last_name = '$lastname' WHERE id = '$admin_id'";
    } else {
        // If no password is provided, update without changing it
        $sql = "UPDATE admin_login SET admin_email = '$email', admin_username = '$username', first_name = '$firstname', last_name = '$lastname' WHERE id = '$admin_id'";
    }

    if (mysqli_query($conn, $sql)) {
        // Redirect to superadmin_profile if the admin is a superadmin
        header("Location: ../admin_profile.php");
        exit(); // Make sure to call exit after header to stop script execution
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
}
?>
