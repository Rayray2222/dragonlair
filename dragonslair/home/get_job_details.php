<?php
// get_job_details.php

// Include the database connection file
include('../connection/db.php');

// Check if job_id is provided via GET request
if (isset($_GET['job_id'])) {
    $job_id = intval($_GET['job_id']); // Sanitize the job_id to ensure it's an integer

    // Query to fetch job details based on job_id
    $query = "SELECT job_offer.*, Recruiters.companyname, Recruiters.email, Recruiters.rec_fname, Recruiters.rec_lname
              FROM job_offer
              JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id
              WHERE job_offer.job_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $job_id); // Bind the job_id to the query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the job details
        $row = $result->fetch_assoc();
        $companyname = $row['companyname'];
        $job_description = $row['job_description'];
        $email = $row['email'];
        $rec_fname = $row['rec_fname'];
        $rec_lname = $row['rec_lname'];
        // Optional: You can fetch other job details you want to display in the modal
    } else {
        // If no job is found for the given job_id, show a default message
        $companyname = "Job not found";
        $job_description = "Sorry, no job details available.";
        $email = "N/A";
        $rec_fname = "Unknown";
        $rec_lname = "Unknown";
    }

    // Close the prepared statement
    $stmt->close();

    // Return the HTML with the job details
    echo "
    <div class='text-center'>
        <img src='https://via.placeholder.com/400x200.png?text=Department+Image' alt='Department Image' class='img-fluid mb-3'>
    </div>
    <h2 class='box-title' style='font-weight:bold;text-align:center;'>$companyname</h2>
    <br>
    <h4 style='text-align:center; font-weight: bold;'>Posted by: $rec_fname $rec_lname</h4>
    <p>" . nl2br(htmlspecialchars($job_description)) . "</p>
    <p style='font-weight:bold;'>Contact: <a href='mailto:$email'>$email</a></p>
    ";
}
?>
