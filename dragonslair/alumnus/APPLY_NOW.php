<?php
include('session/session_check.php');
include('include/header.php');

include('../connection/db.php');

// Check if 'job' ID is passed in URL
if (isset($_GET['job'])) {
    $job_id = $_GET['job'];
    // Store job_id in session to use later in the application process
    $_SESSION['job_id'] = $job_id;
} else {
    echo 'Job not found';
    exit; // Exit if no job ID is provided
}

?>

<style type="text/css">
    .carousel-item {
        height: 25rem;
        background: #ffffff;
        position: relative;
        background-color: #ffffff;
        background-position: center;
    }

    #yy {
        height: 25rem;
        background: #ffffff;
        position: relative;
        background-color: #ffffff;
        background-position: cover;
    }

    .hovver:hover {
        background-color: #E4D611;
    }
</style>

<hr class="my-4">
<div class="row mt-5 mb-3 scroll8">
    <h5 class="display-4 text-center">Apply Job.</h5>
</div>

<!-- Fetch attributes from the job_offer table where the job_id matches the URL parameter -->
<?php
$sql = "SELECT job_offer.*, Recruiters.rec_fname, Recruiters.rec_lname
        FROM job_offer 
        JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id
        WHERE job_offer.job_id = $job_id"; // Filter by job_id
$result = mysqli_query($conn, $sql);

// Check if a job offer was found
if ($row = mysqli_fetch_assoc($result)) {
    // The job offer details are now in $row
} else {
    echo "Job not found!";
    exit;
}
?>

<!-- The Apply Now Form -->
<div class="container-lg col-md-12 col-lg-7 mt-4">
    <div class="daform2">
        <!-- Success message -->
        <?php
        if (isset($_SESSION['status'])) {
            ?>
            <div class="alert alert-success d-flex align-items-center mt-4 container-lg col-md-12 col-lg-7" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <div>
                    &nbsp;
                    <?php echo $_SESSION['status']; ?>
                </div>
            </div>
            <?php
            // Now release the session variable after showing the message
            unset($_SESSION['status']);
        }
        ?>

        <!-- Job Details Card -->
        <div class="card border-primary scroll4 shadow-lg">
            <h5 class="card-header text-center fs-2 border-success bg-success"
                style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">
                <?php echo strtoupper($row['job_title']); ?>
            </h5>
            <div class="card-body">
                <form action="phpcode/apply_now_code.php" method="POST">

                    <div class="row g-3">
                        <hr class="mt-4">

                        <!-- Company Name -->
                        <div class="col-sm-6">
                            <h5 class="mb-1"><?php echo $row['companyname']; ?>:</h5>
                            <div class="my-2"></div>
                        </div>

                        <!-- Salary -->
                        <div class="col-sm-6">
                            <h5 class="mb-1">Salary:</h5>
                            <div class="my-2">
                                <?php echo number_format($row['salary'], 2) . ' PHP'; ?>
                            </div>
                        </div>

                        <!-- Created At -->
                        <div class="col-sm-6">
                            <h5 class="mb-1">Created At:</h5>
                            <div class="my-2">
                                <?php echo $row['creation_date']; ?>
                            </div>
                        </div>
                        <hr class="mt-4">

                        <!-- Job Description -->
                        <div class="col-12">
                            <h5 class="mb-1">Description:</h5>
                            <div class="my-2">
                                <?php echo nl2br($row['job_description']); ?>
                            </div>
                        </div>
                        <hr class="mt-4">

                        <!-- Requirements -->
                        <div class="col-sm-6">
                            <h5 class="mb-1">Requirements:</h5>
                            <div class="my-2">
                                <?php echo nl2br($row['requirements']); ?>
                            </div>
                        </div>

                        <!-- Benefits -->
                        <div class="col-sm-6">
                            <h5 class="mb-1">Benefits:</h5>
                            <div class="my-2">
                                <?php echo nl2br($row['benefits']); ?>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- Apply Button -->
                    <input type="submit" class="w-100 py-1 fs-2 btn btn-success hover3" placeholder="Save" value="APPLY"
                        name="submit" id="submit" style="font-weight: bold; font-family: Passion One, sans-serif;">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>