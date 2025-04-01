<?php
include('include/header.php');
include('include/sidebar.php');

// Ensure that the recruiter is logged in
if (!isset($_SESSION['rec_id'])) {
    header("Location: login.php");
    exit();
}

$rec_id = $_SESSION['rec_id']; // Get the logged-in recruiter ID
$job_id = isset($_GET['job_id']) ? $_GET['job_id'] : null;

// Redirect if no job ID is passed
if (!$job_id) {
    header("Location: my_job_offers.php");
    exit();
}

include('connection/db.php');

// Fetch the job title for the job with the given job_id
$job_query = mysqli_query($conn, "SELECT job_title FROM job_offer WHERE job_id = '$job_id'");
$job_data = mysqli_fetch_assoc($job_query);
$job_title = $job_data['job_title'] ?? 'Unknown Job Title'; // Use a default if job title is not found

// Fetch applicants for the job
$query = mysqli_query($conn, "SELECT c.*, a.* FROM Candidates c 
                              INNER JOIN applied_jobs a ON c.can_id = a.Can_id 
                              WHERE a.Job_id = '$job_id'");

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4 pb-2 mb-1">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="rec_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="my_job_offers.php">My Job Offers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Applicants for Job:
                <?php echo htmlspecialchars($job_title); ?>
            </li>
        </ol>
    </nav>

    <div class="container-fluid">
        <h2>Applicants for Job: <?php echo htmlspecialchars($job_title); ?></h2>

        <?php
        if (mysqli_num_rows($query) > 0) {
            while ($applicant = mysqli_fetch_array($query)) {
                ?>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo htmlspecialchars($applicant['firstname'] . " " . $applicant['lastname']); ?>
                        </h5>
                        <p class="card-text">Applied for: <?php echo htmlspecialchars($job_title); ?></p>
                        <p class="card-text">Address: <?php echo htmlspecialchars($applicant['Address']); ?></p>
                        <p class="card-text">Gender: <?php echo htmlspecialchars($applicant['gender']); ?></p>
                        <p class="card-text">Registration Date: <?php echo htmlspecialchars($applicant['registrationdate']); ?>
                        </p>

                        <!-- Profile Image -->
                        <div class="profile-img">
                            <?php
                            if (!empty($applicant['image_data'])) {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($applicant['image_data']) . '" alt="Profile Picture" class="img-thumbnail" style="cursor:pointer; width: 100px; height: 100px;" onclick="fetchUserData(' . $applicant['can_id'] . ')">';
                            } else {
                                echo '<img src="path/to/default/image.jpg" alt="Default Profile Picture" class="img-thumbnail" style="cursor:pointer; width: 100px; height: 100px;" onclick="fetchUserData(' . $applicant['can_id'] . ')">';
                            }
                            ?>
                        </div>

                        <!-- Message Button -->
                        <button class="btn btn-primary mt-3"
                            onclick="openMessageModal(<?php echo $applicant['can_id']; ?>)">Send Message</button>

                        <!-- Status Modal Trigger -->
                        <button class="btn btn-warning mt-3"
                            onclick="openStatusModal(<?php echo $applicant['can_id']; ?>)">Update Status</button>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No candidates for this job yet.</p>";
        }
        ?>
    </div>
</main>

<!-- User Info Modal -->
<div class="modal fade" id="userInfoModal" tabindex="-1" aria-labelledby="userInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userInfoModalLabel">Applicant Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="user-info">
                Loading...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Send a Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="messageForm">
                    <input type="hidden" id="messageRecipient" name="recipient_id">
                    <div class="form-group">
                        <label for="messageSubject">Subject</label>
                        <input type="text" class="form-control" id="messageSubject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="messageBody">Message</label>
                        <textarea class="form-control" id="messageBody" name="body" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Update Applicant Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="statusForm">
                    <input type="hidden" id="statusApplicantId" name="applicant_id">
                    <div class="form-group">
                        <label for="applicationStatus">Status</label>
                        <select class="form-control" id="applicationStatus" name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Accepted">Accepted</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>
    // Fetch User Data for Modal
    function fetchUserData(candidateId) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "fetch_user_data.php?can_id=" + candidateId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById('user-info').innerHTML = xhr.responseText;
                    var modal = new bootstrap.Modal(document.getElementById('userInfoModal'), { keyboard: true });
                    modal.show();
                } else {
                    console.error('Failed to fetch user data.');
                }
            }
        };
        xhr.send();
    }






    // Open Message Modal
    function openMessageModal(recipientId) {
        console.log("Opening message modal for recipient: " + recipientId);  // Debugging log
        document.getElementById('messageRecipient').value = recipientId;
        var modal = new bootstrap.Modal(document.getElementById('messageModal'), { keyboard: true });
        modal.show();
    }


    // Handle Message Form Submission
    document.getElementById('messageForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission (this is key to using AJAX)

        console.log("Form submitted!"); // Debugging log

        // Create new FormData object to collect form data
        var formData = new FormData(this);

        // Debug: Log form data to see what gets sent
        formData.forEach((value, key) => {
            console.log(key + ": " + value);  // Debugging log
        });

        // Send the data to send_message.php using Fetch API
        fetch('send_message.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text()) // Get the response from the server
            .then(data => {
                console.log("Server Response: ", data);  // Debugging log
                alert(data);  // Show alert with the server response

                // If the message was sent successfully, close the modal
                if (data.includes("Message sent successfully")) {
                    var modal = bootstrap.Modal.getInstance(document.getElementById('messageModal'));
                    modal.hide();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error sending the message.');
            });
    });

</script>










</body>

</html>