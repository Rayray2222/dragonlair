<?php
include('include/header.php');
include('include/sidebar.php');
include('../../connection/db.php');
$recid = $_SESSION['rec_id'];
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4 pb-2 mb-1">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="rec_dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Candidates</li>
    </ol>
  </nav>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-1 border-bottom">
    <h1 class="h2">Candidates</h1>

  </div>




  <div class="container-fluid"></div>

  <!-- success card stuff -->
  <?php
  if (isset($_SESSION['statusmessage'])) {
    ?>
    <div class="alert alert-success d-flex align-items-center mt-4 container-lg col-md-12 col-lg-7" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill"
        viewBox="0 0 16 16">
        <path
          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
      </svg>
      <div>
        &nbsp;
        <?php echo $_SESSION['statusmessage']; ?>
      </div>
    </div>
    <?php
    // code...
    //now release the session variable
    unset($_SESSION['statusmessage']);
  }

  ?>
  <!-- DATATABLE -->
  <div class=" container-fluid card mt-4 shadow-lg">

    <div class="card-body">

      <table id="example" class="table table-striped wrap-text" style="width:100%">

        <thead>
          <tr>
            <th>Profile</th>
            <th>#ID</th>
            <th>Email</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job Applied</th>

            <th>address</th>
            <th>city</th>
            <th>country</th>
            <th>zipcode</th>
            <th>birth</th>
            <th>gender</th>
            <th>registrationdate</th>
            <th>Message</th>
            <th>Status</th>
            <th>Edit Stat</th>
          </tr>
        </thead>
        <tbody>

          <?php

          $query = mysqli_query($conn, "SELECT *
FROM Candidates c
INNER JOIN applied_jobs a ON c.can_id = a.Can_id
INNER JOIN job_offer j ON a.Job_id = j.job_id
WHERE c.status = 1 AND j.rec_id = $recid");
          while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>

              <td>
                <?php
                // Check if image data exists
                if (!empty($row['image_data'])) {
                  // Output the image directly with onclick event
                  echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" 
          alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;" 
          onclick="fetchUserData(' . $row['can_id'] . ')" style="cursor: pointer;">';
                } else {
                  echo '<img src="path/to/default/image.jpg" alt="Default Profile Picture" style="width: 50px; height: 50px; border-radius: 50%;" 
          onclick="fetchUserData(' . $row['can_id'] . ')" style="cursor: pointer;">';
                }
                ?>
              </td>

              <!-- MESSAGING MODAL -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">User Information</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div id="user-info"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <script>
                function fetchUserData(candidateId) {
                  // AJAX request to fetch user data
                  var xhr = new XMLHttpRequest();
                  xhr.open("GET", "fetch_user_data.php?can_id=" + candidateId, true);
                  xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                        // On success, update the modal content with the user data
                        document.getElementById('user-info').innerHTML = xhr.responseText;
                        // Show the modal
                        var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                        modal.show();
                      } else {
                        console.error('Failed to fetch user data.');
                      }
                    }
                  };
                  xhr.send();
                }
              </script>




















              <td>
                <?php echo $row['can_id']; ?>
              </td>
              <td>
                <?php echo $row['Email']; ?>
              </td>
              <td>
                <?php echo $row['Username']; ?>
              </td>
              <td>
                <?php echo $row['firstname']; ?>
              </td>
              <td>
                <?php echo $row['lastname']; ?>
              </td>
              <td>
                <?php echo $row['job_title']; ?>
              </td>

              <td>
                <?php echo $row['Address']; ?>
              </td>
              <td>
                <?php echo $row['City']; ?>
              </td>
              <td>
                <?php echo $row['Country']; ?>
              </td>
              <td>
                <?php echo $row['zipcode']; ?>
              </td>
              <td>
                <?php echo $row['birth']; ?>
              </td>
              <td>
                <?php echo $row['gender']; ?>
              </td>
              <td>
                <?php echo $row['registrationdate']; ?>
              </td>
              <td>
                <div class="row">
                  <div class="btn-group">
                    <button
                      onclick="getId(<?php echo $row['rec_id']; ?>, <?php echo $row['can_id']; ?>, <?php echo $row['job_id']; ?>); setRecipient('@<?php echo $row['Username']; ?>')"
                      class="btn btn-primary" id="myBtn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                        class="bi bi-chat-left-dots-fill"></i></button>




                    <!-- Dropdown menu -->
              <td id="statut_<?php echo $row['app_id']; ?>">
                <?php echo $row['statut']; ?>
              </td>




              <script>
                function updateStatus(app_id, newStatus) {

                  var xhr = new XMLHttpRequest();

                  xhr.open("POST", "approved.php?id=<?php echo $row['app_id']; ?>", true);
                  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                  xhr.onreadystatechange = function () {

                    if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                        // Request was successful
                        console.log(xhr.responseText);
                        // Update the status in the td
                        document.getElementById('statut_<?php echo $row['app_id']; ?>').innerText = newStatus;
                        // Update the status in the dropdown button
                        document.getElementById('dropdownMenuButton_<?php echo $row['app_id']; ?>').innerText = newStatus;
                      } else {
                        // Request failed
                        console.error('Request failed. Status: ' + xhr.status);
                      }
                    }
                  };
                  var url = "http://localhost/shingshong/wepb/recruiter/dashboard/phpcode/approve.php";
                  xhr.open("GET", url, true);
                  xhr.send("status=" + newStatus);
                }
              </script>


              <td>
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button"
                    id="crudDropdown_<?php echo $row['app_id']; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                    EDIT
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="crudDropdown_<?php echo $row['app_id']; ?>">
                    <li><a class="dropdown-item" href="#"
                        onclick="handleApprove('<?php echo $row['app_id']; ?>')">Approve</a></li>
                    <li><a class="dropdown-item" href="#"
                        onclick="handleReject('<?php echo $row['app_id']; ?>')">Reject</a></li>
                    <!-- Add more CRUD options here -->
                  </ul>
                </div>
                <!-- CRUD Dropdown -->
              </td>





              <script>
                // Function to handle the click event for the "Approve" option
                var url = "http://localhost/shingshong/wepb/recruiter/dashboard/phpcode/approve.php";
                function handleApprove(id) {
                  // AJAX request to call the PHP script for approval
                  var xhr = new XMLHttpRequest();
                  xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                        // On success, reload the page or perform any other action
                        window.location.reload();
                      } else {
                        // On failure, display an error message
                        alert("Failed to approve candidate.");
                      }
                    }
                  };

                  xhr.open("GET", "phpcode/approve.php?id=" + id, true);
                  xhr.send();
                }

                // Function to handle the click event for the "Reject" option
                function handleReject(id) {
                  // AJAX request to call the PHP script for rejection
                  var xhr = new XMLHttpRequest();
                  xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                        // On success, reload the page or perform any other action
                        window.location.reload();
                      } else {
                        // On failure, display an error message
                        alert("Failed to reject candidate.");
                      }
                    }
                  };

                  xhr.open("GET", "phpcode/reject.php?id=" + id, true);
                  xhr.send();
                }
              </script>




      </div>




    </div>


    </td>

    </tr>
    <!-- MESSAGING MODAL -->


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Recipient: </label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="send" class="btn btn-primary">Send message</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <th>Profile</th>
      <th>#ID</th>
      <th>Email</th>
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Job Title</th>

      <th>address</th>
      <th>city</th>
      <th>country</th>
      <th>zipcode</th>
      <th>birth</th>
      <th>gender</th>
      <th>registrationdate</th>
      <th>Message</th>
    </tr>
  </tfoot>
  </table>
  </div>
  </div>





</main>
</div>
</div>
</div>












<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
  integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
  </script>
<script src="js/dashboard.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>



<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>

<script type="text/javascript">
  new DataTable('#example', {
    // responsive: true
    scrollX: true
  });

  function getId(recid, canid, jobid) {
    //btnValue = document.getElementById("myBtn").value;

    document.getElementById("send").onclick = function () {
      // Get the value of the textarea
      var message = document.getElementById("message-text").value;


      // Specify the URL you want to navigate to
      var url = "phpcode/message_code.php?val1=" + recid + "&val2=" + canid + "&val3=" + jobid + "&message=" +
        encodeURIComponent(message);
      // Navigate to the URL
      window.location.href = url;
    }
  }

  //display the recipient's username
  function setRecipient(user_name) {
    // Get the recipient input field in the modal
    var recipientInput = document.getElementById("recipient-name");

    // Set the value of the recipient input field to the ID
    recipientInput.value = user_name;
  }
</script>

</body>

</html>