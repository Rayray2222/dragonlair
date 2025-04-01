<?php
// Include your database connection
include('../connection/db.php');

// SQL query to fetch all job offers
$query = "SELECT job_offer.*, Recruiters.rec_fname, Recruiters.rec_lname 
          FROM job_offer 
          JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id";

$result = mysqli_query($conn, $query);

// Start the carousel
echo '<div class="container mt-5">';
echo '<div class="row">';
echo '<h5 class="display-4 text-center scroll8">All Job Offers</h5>';
echo '</div>';

// Job Listing Carousel (with updated structure)
echo '<div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30" style="display: inline-block; text-align: left;">';
echo '<div class="flex-viewport" style="overflow: hidden; position: relative;">';
echo '<ul class="slides image-box hotel listing-style1" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-300px, 0px, 0px);">';

// Check if there are any job offers
if (mysqli_num_rows($result) > 0) {
    // Loop through all the job offers
    while ($row = mysqli_fetch_assoc($result)) {
        $job_title = $row['job_title'];
        $companyname = $row['companyname'];
        $job_type = $row['job_type'];
        $job_description = $row['job_description'];
        $salary = $row['salary'];
        $rec_fname = $row['rec_fname'];
        $rec_lname = $row['rec_lname'];

        // Assign job offer badges based on type
        $badge = "";
        switch ($job_type) {
            case 'fullTime':
                $badge = '<span class="badge rounded-pill text-bg-success">Full Time</span>';
                break;
            case 'partTime':
                $badge = '<span class="badge rounded-pill text-bg-danger">Part Time</span>';
                break;
            case 'freelance':
                $badge = '<span class="badge rounded-pill text-bg-warning">Freelance</span>';
                break;
            case 'internship':
                $badge = '<span class="badge rounded-pill text-bg-info">Internship</span>';
                break;
            case 'temporary':
                $badge = '<span class="badge rounded-pill text-bg-dark">Temporary</span>';
                break;
        }

        // Output job offer inside the carousel <li> element
        echo '<li style="width: 270px; float: left; display: block;">';
        echo '<article class="box">';
        echo '<figure>';
        echo '<a href="#" class="hover-effect popup-gallery">';
        echo '<img width="270" height="160" alt="Job Image" src="https://via.placeholder.com/270x160" draggable="false">';
        echo '</a>';
        echo '</figure>';
        echo '<div class="details">';

        // Salary and Job Type display
        echo '<div class="salary-job-type">';
        echo '<span class="price"><small>Salary: </small>' . 'PHP ' . number_format($salary) . '</span>';
        echo '<span class="job-type">' . $badge . '</span>';
        echo '</div>';

        // Job title and company name
        echo '<h4 class="box-title">' . $job_title . '<small>' . $companyname . '</small></h4>';

        // Job description
        echo '<p class="job_description">' . $job_description . '</p>';

        // Recruiter name
        echo '<p class="recruiter-name"><small>Posted by: ' . $rec_fname . ' ' . $rec_lname . '</small></p>';

        // Action buttons
        echo '<div class="action">';
        echo '<a class="button btn-small" href="create_alumni.php">APPLY NOW</a>';
        echo '<a class="button btn-small yellow popup-map" href="#" data-job-id="' . $row['job_id'] . '" data-companyname="' . $companyname . '" data-job-description="' . htmlspecialchars($job_description) . '" data-email="' . $row['email'] . '" data-toggle="modal" data-target="#departmentModal">See More</a>';
        echo '</div>';

        echo '</div>'; // Close details
        echo '</article>';
        echo '</li>';
    }
} else {
    echo "<h6>No job offers found</h6>";
}

echo '</ul>'; // Close slides
echo '</div>'; // Close flex-viewport
echo '</div>'; // Close carousel container

// Show More Button
echo '<div class="show-more-container">';
echo '<button class="btn fs-2 btn-dark btn-block mt-4 rounded-5 pb-1 shadow-lg hover3 scroll8" style="font-weight: bold; font-family: Passion One, sans-serif;" id="more">SHOW MORE</button>';
echo '</div>'; // Close show-more-container
echo '</div>'; // Close container
?>