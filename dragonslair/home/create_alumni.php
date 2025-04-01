<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumni Registration</title>

    <!--Fonts-->
    <style type="text/css">
        @font-face {
            font-family: 'Bungee Shade';
            src: url('fonts/Bungee_Shade/BungeeShade-Regular.ttf') format('truetype');
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: 'Oswald';
            src: url('fonts/Oswald/static/Oswald-Regular.ttf') format('truetype');
        }
    </style>
    <style type="text/css">
        @font-face {
            font-family: 'Passion One';
            src: url('fonts/Passion_One/PassionOne-Bold.ttf') format('truetype');
        }
    </style>



    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">






    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="css/logoscroll.css">
    <link rel="stylesheet" type="text/css" href="css/scroll.css">
    <link rel="stylesheet" type="text/css" href="css/hoverr.css">

</head>


<style type="text/css">
    .form-label {
        font-weight: bold;

        display: block;
        /* Ensure labels take up full width */
        margin-bottom: 0.5rem;
        /* Add some space between the label and the input field */
    }

    .container-lg {
        width: 45%;
        /* Reduced width from 90% to 70% */
        margin: 0 auto;
        /* Center the container horizontally */

    }


    .card {
        background: linear-gradient(to right, rgba(171, 186, 124, 0.8), rgba(251, 244, 219, 0.8));
        /* Green #ABBA7C to Yellow #FBF4DB gradient */
        width: 100%;
        margin: 0 auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Optional shadow */
    }
</style>

<body class="vh-100"
    style="background-image: url('img/careerlink2.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
    <!-- navbar -->
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg fixed-top py-2">
        <div class="container-fluid">
            <style>
                .navbar-toggler .navbar-toggler-icon {
                    font-weight: bold;
                    font-size: 1.2rem;
                    /* Smaller icon */
                }

                .navbar-brand {
                    font-size: 1.5rem;
                    /* Adjust navbar brand size */
                }

                .nav-link {
                    font-size: 1rem;
                    /* Smaller font size for links */
                }

                .btn-blue {
                    font-size: 1rem;
                    /* Adjust button font size */
                }
            </style>

            <!-- Toggle bar btn (for mobile view) -->
            <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="blue">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-list-stars" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5" />
                    </svg>
                </span>
            </button>

            <!-- SIGN IN BTN (only on small screens) -->
            <a href="sign_in.php" class="fs-6 rounded-3 navbar-brand btn btn-blue d-lg-none btn-sm"
                style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">
                SIGN IN</a>

            <!-- Left-aligned navbar items -->
            <div class="d-flex flex-grow-1">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- CareerLink brand and home links -->
                    <li id="specialNavItem" class="nav-item">
                        <a class="fs-4 nav-link active" aria-current="page" href="index.php">CareerLink</a>
                    </li>
                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="jobs.php"
                            style="font-weight: bold; font-family: Roboto;">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="jobs_search.php"
                            style="font-weight: bold; font-family: Roboto;">Search Job</a>
                    </li>



                </ul>
            </div>

            <!-- Right-aligned navbar items (About, Login) -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="fs-5 nav-link" href="#" style="font-weight: bold; font-family: Roboto;">About</a>
                </li>
                <li class="nav-item">
                    <a class="fs-5 nav-link" href="sign_in.php" style="font-weight: bold; font-family: Roboto;">Login
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 2 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

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




    <!-- Custom styles for this template -->
    <link href="css/create_candidate.css" rel="stylesheet">
    <div class=" container-lg col-md-12 col-lg-7 mt-4">


        <form action="phpcode/can_create_code.php" class="needs-validation daform" novalidate="" name="admin_form"
            id="admin_form" method="POST" enctype="multipart/form-data">


            <div class="card">
                <h5 class="card-header text-center fs-2" style=" font-weight: bold; font-family: Monospace;">
                    Create an alumni account</h5>
                <div class="card-body">
                    <div class="">
                        <!-- success card stuff -->
                        <?php
                        if (isset($_SESSION['status'])) {
                            ?>
                            <div class="alert alert-danger d-flex align-items-center mt-4 container-lg col-md-12 col-lg-7"
                                role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                                </svg>
                                <div>
                                    &nbsp;
                                    <?php echo $_SESSION['status']; ?>
                                </div>
                            </div>
                            <?php
                            // code...
                            //now release the session variable
                            unset($_SESSION['status']);
                        }

                        ?>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label" style="font-weight:bold;">First name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder=""
                                    value="" required="">
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="lastName" class="form-label" style="font-weight:bold;">Last name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder=""
                                    value="" required="">
                                <div class="invalid-feedback">
                                    Valid last name is required.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="Username" class="form-label" style="font-weight:bold;">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Username" required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="Email" class="form-label" style="font-weight:bold;"> Email <span
                                        class="text-body-secondary"></span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="you@example.com" required="">
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label" style="font-weight:bold;">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Please enter your password.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label" style="font-weight:bold;">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Please enter your phone number.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label" style="font-weight:bold;">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Please enter your address.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label" style="font-weight:bold;">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Please enter your city.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label" style="font-weight:bold;">Country</label>
                                <select class="form-select" id="country" name="country" required="">
                                    <option value="" disabled selected>Choose...</option>
                                    <?php
                                    $countries = array(
                                        "Philippines"
                                    );

                                    foreach ($countries as $country) {
                                        echo "<option value='$country'>$country</option>";
                                    }
                                    ?>

                                </select>
                                <div class="invalid-feedback">
                                    Please enter your country.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required="">
                                <div class="invalid-feedback">
                                    Please enter your Zip.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Date Of Birth</label>
                                <input type="date" class="form-control" id="birth" name="birth" placeholder=""
                                    required="">
                                <div class="invalid-feedback">
                                    Please enter your Date Of Birth.
                                </div>
                            </div>
                            <hr class="mt-4">
                            <div class="col-sm-4">
                                <h5 class="mb-1">Gender</h5>
                                <div class="my-2">
                                    <div class="form-check">
                                        <input id="male" name="gender" type="radio" class="form-check-input" required=""
                                            value="Male">
                                        <label class="form-check-label" for="credit">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="female" name="gender" type="radio" class="form-check-input"
                                            required="" value="Female">
                                        <label class="form-check-label" for="debit">Female</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-8">
                                <h5 class="mb-1">Upload Photo</h5>
                                <input type="file" class="form-control mt-3" id="file" name="image" required="">

                                <div class="invalid-feedback">
                                    Please upload a photo.
                                </div>
                            </div>

                        </div>
                        <hr class="my-4">
                        <input type="submit" class="w-100 fs-3 btn btn-blue hover3" placeholder="save" value="SUBMIT"
                            name="submit" id="submit"
                            style="font-weight: bold; font-family: Passion One, sans-serif; background-color: #798645; border: none; color: white;">

                    </div>
                </div>
        </form>
    </div>
    </div>