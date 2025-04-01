<?php
// Include database connection
include('db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']); // Get password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    // Check if email already exists
    $check_email_query = "SELECT * FROM admin_table WHERE admin_email='$email'";
    $result = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($result) > 0) {
        echo "This email is already registered. Please use a different email.";
    } else {
        // Insert admin data into database
        $sql = "INSERT INTO admin_table (admin_email, admin_pass, first_name, last_name) VALUES ('$email', '$hashed_password', '$firstname', '$lastname')";

        if (mysqli_query($conn, $sql)) {
            echo "Admin registered successfully.";
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
}

// Close connection
mysqli_close($conn);
?>