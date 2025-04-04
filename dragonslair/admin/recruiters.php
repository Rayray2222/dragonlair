<?php
include('include/header.php');
include('include/sidebar.php');

// This session unloading is related to the admin_edit.php
// When reloading the page, the data stays in the elements
$_SESSION['idd'] = null;

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4 pb-2 mb-1">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Faculty Members</li>
        </ol>
    </nav>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-1 border-bottom">
        <h1 class="h2">Faculty Members</h1>
    </div>

    <div class="container-fluid"></div>

    <!-- Success card stuff -->
    <?php
    if (isset($_SESSION['status'])) {
        ?>
        <div class="alert alert-danger d-flex mt-4 container-fluid" role="alert">
            <i class="bi bi-trash-fill"></i>
            <div>
                &nbsp;
                <?php echo $_SESSION['status']; ?>
            </div>
        </div>
        <?php
        // Now release the session variable
        unset($_SESSION['status']);
    }
    ?>

    <!-- DATATABLE -->
    <div class="container-fluid card mt-4">
        <div class="card-body">
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Website</th>
                        <th>Industry</th>
                        <th>Description</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Zip Code</th>
                        <th>Foundation Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include('connection/db.php');

                    // Get the companyname of the logged-in admin
                    // Assuming the admin's ID is stored in session as 'admin_id'
                    $id = $_SESSION['id']; // You should set this value somewhere in your login system
                    $sql_admin = "SELECT companyname FROM admin_login WHERE id = '$id'";
                    $result_admin = mysqli_query($conn, $sql_admin);

                    if ($result_admin) {
                        $admin_data = mysqli_fetch_assoc($result_admin);
                        $admin_companyname = $admin_data['companyname'];

                        // Query recruiters whose companyname matches the admin's companyname
                        $query = mysqli_query($conn, "SELECT * FROM Recruiters WHERE companyname = '$admin_companyname'");

                        // Fetch and display each recruiter
                        while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?php echo $row['rec_id']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['companyname']; ?></td>
                                <td><?php echo $row['website']; ?></td>
                                <td><?php echo $row['industry']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['country']; ?></td>
                                <td><?php echo $row['zip_code']; ?></td>
                                <td><?php echo $row['Foundation']; ?></td>

                                <td>
                                    <div class="row">
                                        <div class="btn-group">
                                            <button onclick="getId(<?php echo $row['rec_id']; ?>)" class="btn btn-danger"
                                                id="myBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <span class="bi bi-trash-fill"></span>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Warning!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Data will be permanently deleted.<br> ARE YOU SURE?
                                        </div>
                                        <div class="modal-footer"></div>
                                        <div class="row mx-2">
                                            <div class="col-md-6">
                                                <button id="fff" class="btn btn-danger mb-2 w-100">DELETE</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="w-100 btn btn-success"
                                                    data-bs-dismiss="modal">CANCEL</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } // End of while loop ?>
                    <?php } else {
                        echo "Error fetching admin data.";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Website</th>
                        <th>Industry</th>
                        <th>Description</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Zip Code</th>
                        <th>Foundation Date</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</main>

<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
    integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp"
    crossorigin="anonymous"></script>

<script src="js/dashboard.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>

<script type="text/javascript">
    new DataTable('#example', {
        scrollX: true
    });
</script>

<script>
    // Global id for modal delete
    function getId(btnValue) {
        document.getElementById("fff").onclick = function () {
            var url = "phpcode/recruiter_delete.php?del=" + btnValue;
            window.location.href = url;
        }
    }
</script>

</body>

</html>