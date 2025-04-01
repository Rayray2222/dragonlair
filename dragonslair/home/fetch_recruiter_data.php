<?php
include('../../connection/db.php'); // Make sure to include your database connection

// Check if 'job_id' is set in the GET request
if (isset($_GET['job_id'])) {
    $job_id = intval($_GET['job_id']); // Get the job_id from the URL query

    // Query to fetch recruiter data based on job_id
    $query = "
        SELECT r.rec_id, r.companyname, r.address, r.description, r.email, r.city, r.country, r.zip_code, r.phone
        FROM recruiters r
        JOIN job_offer j ON r.rec_id = j.rec_id
        WHERE j.job_id = $job_id
    ";

    $result = mysqli_query($conn, $query);

    // Check if a recruiter is found
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Prepare the data to be returned
        $response = [
            'companyname' => htmlspecialchars($row['companyname']),
            'address' => htmlspecialchars($row['address']),
            'description' => htmlspecialchars($row['description']),
            'email' => htmlspecialchars($row['email']),
            'city' => htmlspecialchars($row['city']),
            'country' => htmlspecialchars($row['country']),
            'zip_code' => htmlspecialchars($row['zip_code']),
            'phone' => htmlspecialchars($row['phone']),
            'image' => 'https://via.placeholder.com/400x200.png?text=Department+Image' // Placeholder image
        ];

        // Return the data as a JSON response
        echo json_encode($response);
    } else {
        // Return an error if no recruiter found
        echo json_encode(['error' => 'No recruiter data found for the provided job_id.']);
    }
} else {
    // If no job_id is provided, return an error
    echo json_encode(['error' => 'Job ID is required.']);
}
?>
