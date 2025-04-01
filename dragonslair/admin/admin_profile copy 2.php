<?php
include('include/header.php');
include('include/sidebar.php');

// session_start();

include('../connection/db.php');

// Fetch counts from each table





?>

<?php

$admin_id = $_SESSION['id']; // Adjusted to use 'id'

// Fetch current user data
$query = "SELECT * FROM admin_login WHERE id = '$admin_id'";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result);
if (!$user) {
    die("No user found with the given ID.");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Check if password is being updated
    $password = $_POST['pass'];
    if (!empty($password)) {
        $hashed_password = password_hash(mysqli_real_escape_string($conn, $password), PASSWORD_DEFAULT);
        $sql = "UPDATE admin_login SET admin_email = '$email', admin_pass = '$hashed_password', admin_username = '$username', first_name = '$firstname', last_name = '$lastname' WHERE id = '$admin_id'";
    } else {
        // If no password is provided, update without changing it
        $sql = "UPDATE admin_login SET admin_email = '$email', admin_username = '$username', first_name = '$firstname', last_name = '$lastname' WHERE id = '$admin_id'";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Profile updated successfully.";
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
}


?>










<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
        <h4>Welcome, <?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?>!</h4>

        <div class="btn-toolbar mb-2 mb-md-0">


            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Action two</a></li>
                <li class="nav-item">
                <li>
                    <hr class="dropdown-divider">
                </li>

                <a class=" dropdown-item " href="phpcode/logout.php">
                    <svg class="bi">
                        <use xlink:href="#door-closed" />
                    </svg>
                    Sign out
                </a>
                </li>
            </ul>

        </div>
    </div>





    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link active ms-0"
                href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details"
                target="__blank">Profile</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page"
                target="__blank">Billing</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page"
                target="__blank">Security</a>
            <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"
                target="__blank">Notifications</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form action="phpcode/admin_update.php" method="POST">
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input class="form-control" id="inputUsername" name="username" type="text"
                                    placeholder="Enter your username"
                                    value="<?php echo htmlspecialchars($user['admin_username']); ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">First name</label>
                                    <input class="form-control" id="inputFirstName" name="firstname" type="text"
                                        placeholder="Enter your first name"
                                        value="<?php echo htmlspecialchars($user['first_name']); ?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLastName">Last name</label>
                                    <input class="form-control" id="inputLastName" name="lastname" type="text"
                                        placeholder="Enter your last name"
                                        value="<?php echo htmlspecialchars($user['last_name']); ?>">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (email address)-->
                                <div class="mb-3 col-md-12">
                                    <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                    <input class="form-control" id="inputEmailAddress" name="email" type="email"
                                        placeholder="Enter your email address"
                                        value="<?php echo htmlspecialchars($user['admin_email']); ?>">
                                </div>
                            </div>
                            <!-- Form Group (password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputPassword">New Password (leave blank to keep
                                    current)</label>
                                <input class="form-control" id="inputPassword" name="pass" type="password"
                                    placeholder="Enter new password">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>









            </div>
        </div>
    </div>





















    </body>

    </html>