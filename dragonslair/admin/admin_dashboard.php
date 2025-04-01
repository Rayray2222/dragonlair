<?php
include ('include/header.php');
include ('include/sidebar.php');
include ('../connection/db.php');

// Assuming the logged-in user's company is stored in the session
// Let's fetch the logged-in user's company
// Replace with actual logic to get the logged-in user's company
$id = $_SESSION['id'];  // Assume session variable holds the user's ID
$user_query = mysqli_query($conn, "SELECT companyname FROM admin_login WHERE id = '$id'");
$user_row = mysqli_fetch_assoc($user_query);
$user_company = $user_row['companyname'];

// Fetch recruiters for the same company
$recruiter_query = mysqli_query($conn, "SELECT COUNT(*) AS count FROM Recruiters WHERE companyname = '$user_company'");
$recruiter_row = mysqli_fetch_assoc($recruiter_query);
$recruiter_count = $recruiter_row['count'];

// Now you can use this $recruiter_count wherever you want to display the number of recruiters
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Current Recruiters Card -->
            <div class="col-md-3 mb-3">
                <div class="card text-bg-primary text-center h-100">
                    <div class="card-header"><b>Current Recruiters</b></div>
                    <div class="card-body">
                        <h2 class="card-title">
                            <?php echo $recruiter_count; ?>
                        </h2>
                        <a href="recruiters.php" class="btn btn-outline-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-workspace" viewBox="0 0 16 16">
                                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                <path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.4 5.4 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />
                            </svg> &nbsp;Recruiters
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other sections of your page remain the same -->
    </div>
</main>
</div>
</div>
