<?php
include('include/header.php');
include('include/sidebar.php');

// Ensure that the user is logged in and session variable is set
if (!isset($_SESSION['rec_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

$recid = $_SESSION['rec_id'];
include('connection/db.php');

// Fetch the count of job offers for the logged-in recruiter
$sql = "SELECT COUNT(*) AS count
        FROM job_offer j
        INNER JOIN Recruiters r ON r.rec_id = j.rec_id
        WHERE j.status = 1 AND j.rec_id = $recid";  // Filter job offers by rec_id
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jcount = $row['count']; // Store the job offer count for the logged-in recruiter
    }
} else {
    $jcount = 0; // No job offers found
}

// Fetch the count of candidates for the logged-in recruiter's job offers
$sql2 = "SELECT COUNT(*) AS count
         FROM Candidates c
         INNER JOIN applied_jobs a ON c.can_id = a.Can_id
         INNER JOIN job_offer j ON a.Job_id = j.job_id
         WHERE c.status = 1 AND j.rec_id = $recid";  // Filter candidates by rec_id
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $ccount = $row['count']; // Store candidate count for the logged-in recruiter
    }
} else {
    $ccount = 0; // No candidates found
}

// Fetch the first name of the logged-in recruiter
$sql3 = "SELECT rec_fname FROM recruiters WHERE rec_id = $recid LIMIT 1";
$result3 = $conn->query($sql3);
$rec_fname = ''; // Default value if no name is found

if ($result3->num_rows > 0) {
    while ($row = $result3->fetch_assoc()) {
        $rec_fname = $row['rec_fname']; // Store first name for greeting
    }
}
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <h4 class="h4 ms-3">Welcome, <?php echo htmlspecialchars($rec_fname); ?>!</h4>

    <div class="container-fluid">
        <h2> &nbsp;</h2>

        <div class="row">
            <!-- Current Candidates Card -->
            <div class="col-md-6 mb-3">
                <div class="card text-bg-primary text-center h-100">
                    <div class="card-header"><b>Current Candidates</b></div>
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $ccount; ?></h2>
                        <a href="candidates.php" class="btn btn-outline-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                            </svg> &nbsp;Candidates
                        </a>
                    </div>
                </div>
            </div>

            <!-- Current Job Offers Card -->
            <div class="col-md-6 mb-3">
                <div class="card text-bg-primary text-center h-100">
                    <div class="card-header"><b>Current Job Offers</b></div>
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $jcount; ?></h2>
                        <a href="my_job_offers.php" class="btn btn-outline-light btn-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                                <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5" />
                                <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85z" />
                            </svg> &nbsp;My Job Offers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

</div>
</div>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
<script src="js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<!-- charts.js -->
<script src="https://cdnjs.com/libraries/Chart.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>

<script type="text/javascript">
    new DataTable('#example', { scrollX: true });
    new DataTable('#example2', { scrollX: true });
</script>

</body>
</html>
