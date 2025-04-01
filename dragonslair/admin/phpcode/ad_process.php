<?php
// Include database connection
include('../connection/db.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']); // Get password
    $companyname = mysqli_real_escape_string($conn, $_POST['companyname']); // Get company name
    $admin_type = mysqli_real_escape_string($conn, $_POST['admin_type']); // Get admin type

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email_query = "SELECT * FROM admin_login WHERE admin_email='$email'";
    $result = mysqli_query($conn, $check_email_query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn)); // Debugging line
    }

    if (mysqli_num_rows($result) > 0) {
        echo "This email is already registered. Please use a different email.";
    } else {
        // Insert admin data into the database, including company name and admin type
        $sql = "INSERT INTO admin_login (admin_email, admin_pass, first_name, last_name, companyname, admin_type) 
                VALUES ('$email', '$hashed_password', '$firstname', '$lastname', '$companyname', '$admin_type')";

        if (mysqli_query($conn, $sql)) {
            // After successful registration, navigate to the appropriate dashboard
            if ($admin_type == 'superadmin') {
                // Redirect to the Super Admin Dashboard if the user is a superadmin
                header("Location: ../superadmin_dashboard.php");
            } else {
                // Redirect to the Admin Dashboard if the user is an admin
                header("Location: ../admin_dashboard.php");
            }
            exit(); // Stop further script execution after redirect
        } else {
            echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
        }
    }
}

// Close connection
mysqli_close($conn);
?>