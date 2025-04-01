<?php
session_start();
include('connection/db.php');

// Enable MySQLi error reporting (for debugging)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Make sure the recruiter is logged in
if (!isset($_SESSION['rec_id'])) {
    $_SESSION['status'] = "You need to be logged in to delete a job offer.";
    header("Location: login.php");
    exit();
}

$rec_id = $_SESSION['rec_id']; // Get the logged-in recruiter ID

// Get the job ID from the URL parameter
if (isset($_GET['job_id'])) {
    $job_id = $_GET['job_id'];

    // Validate the job ID
    if (!is_numeric($job_id)) {
        $_SESSION['status'] = "Invalid job ID.";
        header('Location: my_job_offers.php');
        exit();
    }

    // Check if the job belongs to the logged-in recruiter
    $check_query = "SELECT * FROM job_offer WHERE job_id = ? AND rec_id = ?";

    // Prepare the statement
    if ($stmt = mysqli_prepare($conn, $check_query)) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "ii", $job_id, $rec_id);

        // Execute the statement
        mysqli_stmt_execute($stmt);

        // Get the result
        $result = mysqli_stmt_get_result($stmt);

        // If the job exists and belongs to the recruiter
        if (mysqli_num_rows($result) > 0) {
            // Proceed with deletion
            $delete_query = "DELETE FROM job_offer WHERE job_id = ?";

            // Prepare the delete statement
            if ($delete_stmt = mysqli_prepare($conn, $delete_query)) {
                // Bind parameters
                mysqli_stmt_bind_param($delete_stmt, "i", $job_id);

                // Execute the delete statement
                if (mysqli_stmt_execute($delete_stmt)) {
                    $_SESSION['status'] = "Job offer deleted successfully.";
                } else {
                    $_SESSION['status'] = "Error deleting job offer.";
                }
            } else {
                $_SESSION['status'] = "Error preparing the delete query.";
            }
        } else {
            $_SESSION['status'] = "Job offer not found or you do not have permission to delete it.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['status'] = "Error preparing the check query.";
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    $_SESSION['status'] = "No job selected for deletion.";
}

// Redirect back to the My Job Offers page
header('Location: my_job_offers.php');
exit();
?>