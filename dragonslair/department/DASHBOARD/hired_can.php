<?php
include('include/header.php');
include('include/sidebar.php');
include('../../connection/db.php');
$recid = $_SESSION['rec_id']; // Recruiter ID

// Check if the recruiter ID is valid before proceeding
if (!isset($recid) || empty($recid)) {
    die("Error: Invalid recruiter ID.");
}

// Select candidates with 'approved' status for jobs associated with this recruiter
$query = mysqli_query($conn, "
    SELECT c.*, a.*, j.job_title
    FROM Candidates c
    INNER JOIN applied_jobs a ON c.can_id = a.Can_id
    INNER JOIN job_offer j ON a.Job_id = j.job_id
    WHERE a.statut = 'approved' AND j.rec_id = $recid
");

// Check for query errors
if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
}

// Insert hired candidate into the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hire_candidate'])) {
    $can_id = $_POST['can_id'];  // Candidate ID
    $firstname = $_POST['firstname'];  // Candidate's first name
    $lastname = $_POST['lastname'];  // Candidate's last name
    $job_applied = $_POST['job_applied'];  // Job the candidate applied for
    $address = $_POST['address'];  // Candidate's address
    $gender = $_POST['gender'];  // Candidate's gender
    $image_data = $_POST['image_data'];  // Candidate's profile image (if any)

    // Check if candidate already hired for this recruiter
    $check_hire = mysqli_query($conn, "SELECT * FROM hired_can WHERE can_id = '$can_id' AND rec_id = '$recid'");
    if (mysqli_num_rows($check_hire) == 0) {
        // Insert into hired_can table
        $insert_query = "INSERT INTO hired_can (can_id, rec_id, firstname, lastname, job_applied, address, gender, hired_date, image_data)
                         VALUES ('$can_id', '$recid', '$firstname', '$lastname', '$job_applied', '$address', '$gender', NOW(), '$image_data')";

        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['statusmessage'] = "Candidate hired successfully!";
        } else {
            $_SESSION['statusmessage'] = "Error in hiring the candidate. Please try again.";
        }
    } else {
        $_SESSION['statusmessage'] = "This candidate has already been hired by you.";
    }
    header("Location: hired_can.php");
    exit();
}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4 pb-2 mb-1">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="rec_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hired Candidates</li>
        </ol>
    </nav>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-1 border-bottom">
        <h1 class="h2">Hired Candidates</h1>
    </div>

    <!-- Success Message Card -->
    <?php
    if (isset($_SESSION['statusmessage'])) {
        ?>
        <div class="alert alert-success d-flex align-items-center mt-4 container-lg col-md-12 col-lg-7" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            <div>&nbsp;<?php echo $_SESSION['statusmessage']; ?></div>
        </div>
        <?php unset($_SESSION['statusmessage']);
    }
    ?>

    <!-- Hired Candidates Table -->
    <div class="container-fluid card mt-4 shadow-lg">
        <div class="card-body">
            <table id="example" class="table table-striped wrap-text" style="width: 100%; table-layout: fixed;">
                <thead>
                    <tr>
                        <th style="text-align: center; width: 10%;">Profile</th>
                        <th style="text-align: center; width: 10%;">First Name</th>
                        <th style="text-align: center; width: 10%;">Last Name</th>
                        <th style="text-align: center; width: 10%;">Job Applied</th>
                        <th style="text-align: center; width: 9%;">Address</th>
                        <th style="text-align: center; width: 15%;">Gender</th>
                        <th style="text-align: center; width: 10%;">Registration Date</th>

                        <th style="text-align: center; width: 10%;">Status</th>
                        <th style="text-align: center; width: 10%;">Hire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch each row and display it
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td>
                                <?php
                                // Display the candidate profile image if available
                                if (!empty($row['image_data'])) {
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">';
                                } else {
                                    echo '<img src="path/to/default/image.jpg" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;">';
                                }
                                ?>
                            </td>
                            <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                            <td><?php echo htmlspecialchars($row['job_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['Address']); ?></td>
                            <td><?php echo htmlspecialchars($row['gender']); ?></td>
                            <td><?php echo htmlspecialchars($row['registrationdate']); ?></td>
                            <td>

                            </td>
                            <td>
                                <?php echo $row['statut']; ?>
                            </td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="can_id" value="<?php echo $row['can_id']; ?>">
                                    <input type="hidden" name="firstname" value="<?php echo $row['firstname']; ?>">
                                    <input type="hidden" name="lastname" value="<?php echo $row['lastname']; ?>">
                                    <input type="hidden" name="job_applied" value="<?php echo $row['job_title']; ?>">
                                    <input type="hidden" name="address" value="<?php echo $row['Address']; ?>">
                                    <input type="hidden" name="gender" value="<?php echo $row['gender']; ?>">
                                    <input type="hidden" name="image_data"
                                        value="<?php echo base64_encode($row['image_data']); ?>">
                                    <button type="submit" name="hire_candidate" class="btn btn-success">Hire</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script>
    // Your existing script for handling actions, like status updates and fetching user data
</script>

</body>

</html>