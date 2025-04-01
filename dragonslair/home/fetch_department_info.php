<?php
include 'db_connection.php'; // Ensure you have database connection here

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['job_id'])) {
    $job_id = intval($_POST['job_id']);

    // Query to fetch department details for the given job ID
    $query = "SELECT job_offer.job_description, 
                     Recruiters.companyname, 
                     Recruiters.email, 
                     Departments.department_image 
              FROM job_offer
              LEFT JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id
              LEFT JOIN Departments ON job_offer.department_id = Departments.department_id
              WHERE job_offer.job_id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $job_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode([
            'companyname' => $row['companyname'],
            'job_description' => $row['job_description'],
            'email' => $row['email'],
            'department_image' => $row['department_image']
        ]);
    } else {
        echo json_encode([
            'error' => 'No department info found for this job.'
        ]);
    }
    $stmt->close();
}
?>
