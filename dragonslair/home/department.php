<?php
include('../connection/db.php');

// Fetch the logged-in admin details (assuming `admin_login` table has the admin info)
$admin_id = 1; // Admin's ID; this should be retrieved from session or authentication

// SQL query to fetch the admin data
$sql_admin = "SELECT * FROM admin_login WHERE admin_id = $admin_id";
$admin_result = $conn->query($sql_admin);

// Check if the query succeeded
if ($admin_result && $admin_result->num_rows > 0) {
    $admin = $admin_result->fetch_assoc();
    $acompanyame = $admin['company_name'];
    $admin_username = $admin['username'];
    $admin_email = $admin['email'];
   
} else {
    echo "No admin record found or query failed.";
    exit; // Exit if no admin is found
}

// SQL query to fetch recruiters count
$sql_recruiters = "SELECT COUNT(*) AS recruiter_count FROM recruiters WHERE companyname = ?";
$stmt_recruiters = $conn->prepare($sql_recruiters);
$stmt_recruiters->bind_param("s", $admin_company_name);
$stmt_recruiters->execute();
$recruiters_result = $stmt_recruiters->get_result();
$recruiters = 0;
if ($recruiters_result && $recruiters_result->num_rows > 0) {
    $recruiters = $recruiters_result->fetch_assoc()['recruiter_count'];
}

// SQL query to fetch candidates count
$sql_candidates = "SELECT COUNT(*) AS candidate_count FROM candidates 
                   WHERE company_id IN (SELECT id FROM recruiters WHERE company_name = ?)";
$stmt_candidates = $conn->prepare($sql_candidates);
$stmt_candidates->bind_param("s", $admin_company_name);
$stmt_candidates->execute();
$candidates_result = $stmt_candidates->get_result();
$candidates = 0;
if ($candidates_result && $candidates_result->num_rows > 0) {
    $candidates = $candidates_result->fetch_assoc()['candidate_count'];
}

// SQL query to fetch jobs count
$sql_jobs = "SELECT COUNT(*) AS job_count FROM jobs WHERE company_name = ?";
$stmt_jobs = $conn->prepare($sql_jobs);
$stmt_jobs->bind_param("s", $admin_company_name);
$stmt_jobs->execute();
$jobs_result = $stmt_jobs->get_result();
$jobs = 0;
if ($jobs_result && $jobs_result->num_rows > 0) {
    $jobs = $jobs_result->fetch_assoc()['job_count'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile Page</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-head {
            transform: translateY(5rem);
        }

        .cover {
            background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
            background-size: cover;
            background-repeat: no-repeat;
        }

        body {
            background: #654ea3;
            background: linear-gradient(to right, #e96443, #904e95);
            min-height: 100vh;
            overflow-x: hidden;
        }
    </style>
</head>

<body>

    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    <div class="media align-items-end profile-head">
                        <div class="profile mr-3">
                            <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80"
                                alt="..." width="130" class="rounded mb-2 img-thumbnail">
                            <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                        </div>
                        <div class="media-body mb-5 text-white">
                            <!-- Display company name and admin username -->
                            <h4 class="mt-0 mb-0"><?= htmlspecialchars($admin_company_name) ?></h4>
                            <p class="small mb-4"><i class="fas fa-user mr-2"></i>Admin: <?= htmlspecialchars($admin_username) ?></p>
                        </div>
                    </div>
                </div>
                <div class="bg-light p-4 d-flex justify-content-end text-center">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"><?= $jobs ?></h5><small class="text-muted"> <i
                                    class="fas fa-image mr-1"></i>Number of jobs</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"><?= $recruiters ?></h5><small class="text-muted">
                                <i class="fas fa-user mr-1"></i>Number of recruiters</small>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="font-weight-bold mb-0 d-block"><?= $candidates ?></h5><small class="text-muted">
                                <i class="fas fa-user mr-1"></i>Number of candidates</small>
                        </li>
                    </ul>
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">About</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <p class="font-italic mb-0">
                            <?= htmlspecialchars($admin_description) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
