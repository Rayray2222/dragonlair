<?php 
session_start();
include('../connection/db.php');

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Retrieve user input from the login form
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Query the database to check if the email and password match
    $query = mysqli_query($conn, "SELECT * FROM admin_login WHERE admin_email='$email' AND admin_pass='$pass'");

    // If the query executes successfully
    if ($query) {

        // Check if any matching records are found
        if (mysqli_num_rows($query) > 0) {
            // Fetch user data
            $data = mysqli_fetch_array($query);

            // Set session variables for the logged-in user
            $_SESSION['id'] = $data['id'];
            $_SESSION['admin_email'] = $data['admin_email'];
            $_SESSION['admin_pass'] = $data['admin_pass'];
            $_SESSION['admin_username'] = $data['admin_username'];
            $_SESSION['first_name'] = $data['first_name'];
            $_SESSION['last_name'] = $data['last_name'];
            $_SESSION['admin_type'] = $data['admin_type'];

            // Redirect based on the admin type (superadmin or admin)
            if ($_SESSION['admin_type'] == 'superadmin') {
                // Redirect to Super Admin Dashboard
                header('Location: ../superadmin_dashboard.php');
                exit();
            } else {
                // Redirect to Admin Dashboard
                header('Location: ../admin_dashboard.php');
                exit();
            }
        } else {
            // If no matching record is found, show error message
            echo "<script>alert('Email or password incorrect. Please try again.');</script>";
            header('Location: ../admin_login.php');
            exit();
        }
    } else {
        // If the query fails for some reason
        echo "<script>alert('Error executing query.');</script>";
        header('Location: ../admin_login.php');
        exit();
    }
}
?>
