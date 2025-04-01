<?php
include('../connection/db.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job-List</title>

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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Passion+One:wght@400;700;900&family=Protest+Strike&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&family=Bungee+Shade&family=Passion+One:wght@400;700;900&family=Protest+Strike&family=Rubik+Doodle+Shadow&family=Rubik+Mono+One&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="css/logoscroll.css">
    <link rel="stylesheet" type="text/css" href="css/scroll.css">
    <link rel="stylesheet" type="text/css" href="css/hoverr.css">

</head>



<body class="vh 100">

    <!-- navbar -->
    <!-- navbar -->

    <nav class="navbar navbar-expand-lg bg-white fixed-top py-2">
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
            background-image: url('img/');
            position: relative;
            background-color: grey;
            background-position: center;
        }

        #yy {
            height: 25rem;
            background: #ffffff;
            position: relative;
            background-color: darkgray;
            background-position: cover;
        }

        .hovver:hover {
            background-color: #E4D611;
        }
    </style>

    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">

            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                class=""></button>

        </div>



        <div class="carousel-inner">


            <div class="carousel-item active" style="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="color: white; font-weight: bold; font-family: ;">
                            Jobs Offer at CareerLink
                            <p>A gateway to success as a PHINMA University of Iloilo</p>
                            <p><a class="btn btn-lg btn-dark"
                                    style="color: white; font-weight: bold; font-family: Passion One, sans-serif;"
                                    href="#">Apply Now <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                    </svg></a></p>
                    </div>
                </div>
            </div>
        </div>










    </div>




    <style>
        /* Ensuring container has controlled overflow */
        .container {
            max-width: 100%;
            overflow: hidden;
        }

        /* For Job Description to avoid overflow and bending */
        .job_description {
            white-space: normal;
            /* Allow wrapping of text */
            overflow: hidden;
            /* Prevent overflow */
            text-overflow: ellipsis;
            /* Truncate overflowing text with ellipsis */
            word-wrap: break-word;
            /* Break long words to avoid overflow */
            height: 100px;
            /* Set a fixed height if needed */
            line-height: 1.6em;
            /* Adjust line height for readability */
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* Limit the number of lines (adjust as needed) */
            -webkit-box-orient: vertical;
        }

        /* Flexbox adjustments for job listing carousel */
        .image-carousel.style2 {
            display: flex;
            flex-wrap: nowrap;
            /* Ensure items don't wrap */
            overflow-x: auto;
            /* Allow horizontal scrolling if needed */
            justify-content: flex-start;
            /* Align carousel items to the left */
        }

        /* Ensure job listing boxes stay contained */
        .box {
            max-width: 270px;
            /* Ensure box size is contained */
            overflow: hidden;
            /* Hide overflowing content */
            padding: 10px;
            border: 1px solid #ccc;
            /* Optional: Border for visibility */
            box-sizing: border-box;
            /* Include padding in the box model */
        }

        /* Adjust carousel list items */
        .slides {
            display: flex;
            justify-content: flex-start;
            /* Align slides to the left */
            overflow: hidden;
            /* Ensure no item overflows horizontally */
            padding: 0;
        }

        /* Ensure each carousel item doesn’t stretch */
        .slides>li {
            flex-shrink: 0;
            /* Prevent item from shrinking */
            width: 270px;
            /* Ensure each item has a fixed width */
        }

        /* Flexbox utility for action buttons */
        .action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 5px;
        }


        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            margin:
                0;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
            zoom: 1
        }

        html {
            font-size: 16px;
            min-height: 100%
        }

        body {
            font: 75%/150% "Lato", Arial, Helvetica, sans-serif;
            background-color: #fff;
            color: #838383;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -ms-overflow-style:
                scrollbar;
            oveflow-y: scroll
        }

        iframe,
        img {
            border: 0
        }

        a {
            text-decoration: none;
            color: inherit
        }

        a:hover,
        a:focus {
            color: #01b7f2;
            text-decoration: none
        }

        a:focus {
            outline: none
        }

        p {
            font-size: 1.0833em;
            line-height: 1.6666;
            margin-bottom:
                15px
        }

        dt {
            font-weight: normal
        }

        span.active,
        a.active,
        h2.active,
        h3.active,
        h4.active,
        h5.active,
        h6.active {
            color: #01b7f2
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0 0 15px;
            font-weight: normal;
            color: #2d3e52
        }

        h1 {
            font-size: 2em;
            line-height: 1.25em
        }

        h2 {
            font-size: 1.6667em;
            line-height: 1.25em
        }

        h3 {
            font-size: 1.5em;
            line-height: 1.2222em
        }

        h4 {
            font-size: 1.3333em;
            line-height: 1.25em
        }

        h5 {
            font-size: 1.1666em;
            line-height: 1.1428em
        }

        h6 {
            font-size: 1em
        }

        h1.fourty-space {
            font-size: 1.3333em;
            line-height: 1.25em;
            letter-spacing: .04em
        }

        h2.fourty-space {
            font-size:
                1.1666em;
            line-height: 1.1428em;
            letter-spacing: .04em
        }

        h3.fourty-space {
            font-size: 1.0833em;
            line-height: 1.1428em;
            letter-spacing: .04em
        }

        h4.fourty-space {
            font-size: 1em;
            line-height: 1.1em;
            letter-spacing: .04em
        }

        h5.fourty-space {
            font-size: 0.9166;
            line-height: 1.1em;
            letter-spacing: .04em
        }

        h6.fourty-space {
            font-size:
                0.8333em;
            line-height: 1.1em;
            letter-spacing: .04em
        }

        ol,
        ul {
            list-style: none;
            margin: 0
        }

        .banner .med-caption {
            font-size: 2.5em
        }

        .box-title {
            margin-bottom: 0;
            line-height: 1em
        }

        .box-title small {
            font-size: 10px;
            color: #838383;
            text-transform: uppercase;
            display: block;
            margin-top: 4px
        }

        button,
        input[type="button"].button,
        a.button {
            border: none;
            color: #fff;
            cursor: pointer;
            padding: 0 15px;
            white-space: nowrap
        }

        button.btn-small,
        input[type="button"].button.btn-small,
        a.button.btn-small {
            height: 28px;
            padding: 0 24px;
            line-height:
                28px;
            font-size: 0.9167em
        }

        a.button {
            display: inline-block;
            background: #d9d9d9;
            font-size: 0.8333em;
            line-height: 1.8333em;
            white-space: nowrap;
            text-align: center
        }

        a.button:hover {
            background: #98ce44
        }

        button.yellow,
        a.button.yellow,
        input[type="button"] button.yellow {
            background: #f0715f
        }

        button.yellow:hover,
        a.button.yellow:hover,
        input[type="button"].button.yellow:hover {
            background: #f0715f
        }

        . five-stars-container {
            display: inline-block;
            position: relative;
            font-family: 'Glyphicons Halflings';
            font-size: 14px;
            text-align: left;
            cursor:
                default;
            white-space: nowrap;
            line-height: 1.2em;
            color: #dbdbdb
        }

        .five-stars-container .five-stars,
        .five-stars-container.editable-rating .ui-slider-range {
            display: block;
            overflow: hidden;
            position: relative;
            background: #fff;
            padding-left: 1px
        }

        .five-stars-container .five-stars:before,
        .five-stars-container .editable-rating .ui-slider-range:before {
            content: "\e006\e006\e006\e006\e006";
            color: #ef715f
        }

        .five-stars-container:before {
            display: block;
            position: absolute;
            top:
                0;
            left: 1px;
            content: "\e006\e006\e006\e006\e006";
            z-index: 0
        }

        .price {
            color: #7db921;
            font-size: 1.6667em;
            text-transform: uppercase;
            float: right;
            text-align:
                right;
            line-height: 1;
            display: block
        }

        .price small {
            display: block;
            color: #838383;
            font-size: 0.5em
        }

        .price-wrapper {
            font-weight: normal;
            text-transform: uppercase;
            font-size:
                0.8333em;
            color: inherit;
            line-height: 1.3333em;
            margin: 0
        }

        .price-wrapper .price-per-unit {
            color: #7db921;
            font-size: 1.4em;
            padding-right: 5px
        }

        .image-carousel.style2 .slides>li {
            margin-right: 30px
        }

        .image-box .box>.details,
        .image-box.box>.details {
            padding: 12px 15px
        }

        .listing-style1.hotel .feedback {
            margin: 5px 0;
            border-top: 1px solid #f5f5f5;
            padding-top: 5px;
            border-bottom: 1px solid #f5f5f5
        }

        .listing-style1.hotel .feedback .review {
            display: block;
            float: right;
            text-transform: uppercase;
            font-size: 0.8333em;
            color: #9e9e9e
        }

        .listing-style1.hotel .action .button:last-child {
            float: right
        }

        .box {
            border: 1px solid #cccccc
        }

        .fa {
            color: #f0715f
        }
    </style>






    <div class="row">
        <h5 class="display-4 text-center scroll8"> ...</h5>
    </div>


    <div class="job-section-container" style="text-align: center;">
        <!-- Job Carousel -->
        <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30"
            style="display: inline-block; text-align: left;">
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <ul class="slides image-box hotel listing-style1"
                    style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-300px, 0px, 0px);">

                    <!-- PHP Query and Job Items -->
                    <?php
                    $query = "SELECT job_offer.*, Recruiters.rec_fname, Recruiters.rec_lname ,Recruiters.email ,Recruiters.companyname
                          FROM job_offer 
                          LEFT JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id 
                          ORDER BY job_offer.job_id";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the job offers and display them as carousel items
                        while ($row = mysqli_fetch_assoc($result)) {
                            $job_title = $row['job_title'];
                            $companyname = $row['companyname'];  // Company name
                            $job_type = $row['job_type'];
                            $job_description = $row['job_description'];  // Job description
                            $salary = $row['salary']; // Salary
                            $rec_fname = $row['rec_fname'] ?? 'Unknown'; // Recruiter's first name or fallback to 'Unknown'
                            $rec_lname = $row['rec_lname'] ?? ''; // Recruiter's last name (if exists)
                            $email = $row['email'];

                            // Assign job offer badges based on type
                            $badge = "";
                            switch ($job_type) {
                                case 'fullTime':
                                    $badge = '<span class="badge rounded-pill text-bg-success">Full Time</span>';
                                    break;
                                case 'partTime':
                                    $badge = '<span class="badge rounded-pill text-bg-danger">Part Time</span>';
                                    break;
                                case 'freelance':
                                    $badge = '<span class="badge rounded-pill text-bg-warning">Freelance</span>';
                                    break;
                                case 'internship':
                                    $badge = '<span class="badge rounded-pill text-bg-info">Internship</span>';
                                    break;
                                case 'temporary':
                                    $badge = '<span class="badge rounded-pill text-bg-dark">Temporary</span>';
                                    break;
                            }
                            ?>
                            <li style="width: 270px; float: left; display: block;">
                                <article class="box">
                                    <figure>
                                        <a href="#" class="hover-effect popup-gallery">
                                            <img width="250" height="160" alt="Job Image"
                                                src="https://via.placeholder.com/270x160" draggable="false">
                                        </a>
                                    </figure>
                                    <div class="details">
                                        <!-- Salary and Job Type display -->
                                        <div class="salary-job-type">
                                            <span class="price">
                                                <small>Salary: </small>
                                                <?php echo 'PHP' . number_format($salary); ?>
                                            </span>
                                            <!-- Job Type Badge displayed to the right of Salary -->
                                            <span class="job-type">
                                                <?php echo $badge; ?>
                                            </span>
                                        </div>

                                        <h4 class="box-title">
                                            <?php echo $job_title; ?><small><?php echo $companyname; ?></small>
                                        </h4>
                                        <div class="feedback">
                                            <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star"
                                                title="4 stars">
                                                <span style="width: 80%;" class="five-stars"></span>
                                            </div>
                                            <span class="review">170 reviews</span>
                                        </div>

                                        <!-- Job Description -->
                                        <p class="job_description"><?php echo $job_description; ?></p>

                                        <!-- Display the recruiter's name -->
                                        <p class="recruiter-name">
                                            <small>Posted by: <?php echo $rec_fname . ' ' . $rec_lname; ?></small>
                                        </p>

                                        <div class="action">
                                            <a class="button btn-small" href="create_alumni.php">APPLY NOW</a>


                                            <a class="button btn-small yellow popup-map" href="#"
                                                data-job-id="<?php echo $row['job_id']; ?>"
                                                data-companyname="<?php echo $companyname; ?>"
                                                data-job-description="<?php echo htmlspecialchars($job_description); ?>"
                                                data-email="<?php echo $email; ?>" data-toggle="modal"
                                                data-target="#departmentModal">See More</a>



                                        </div>

                                    </div>
                                </article>
                            </li>
                            <?php
                        }
                    } else {
                        echo "<h6>No job offers found</h6>";
                    }
                    ?>
                </ul>
            </div>
        </div>

        <!-- Show More Button -->
        <div class="show-more-container">
            <style>
                .show-more-container #more {
                    display: block;
                    width: 20%;
                    margin: 20px auto 0;
                    text-align: center;
                }

                @media (max-width: 991px) {
                    .show-more-container #more {
                        width: 30%;
                    }
                }

                @media (max-width: 539px) {
                    .show-more-container #more {
                        width: 45%;
                    }
                }

                @media (max-width: 768px) {
                    .show-more-container #more {
                        width: 45%;
                    }
                }
            </style>
            <button class="btn fs-2 btn-dark btn-block mt-4 rounded-5 pb-1 shadow-lg hover3 scroll8"
                style="font-weight: bold; font-family: Passion One, sans-serif;" id="more">SHOW MORE</button>
        </div>
    </div>



















    <!-- Department Info Modal -->
    <!-- Department Info Modal -->
    <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="departmentModalLabel" style="text-align:center;">JOB INFORMATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <!-- Department Image -->
                        <img src="https://via.placeholder.com/400x200.png?text=Department+Image" alt="Department Image"
                            class="img-fluid mb-3">
                    </div>

                    <!-- Dynamic Job Information -->
                    <h2 class="companyname" style="font-weight:bold;text-align:center;"></h2>
                    <p class="job-description"></p>
                    <p style="font-weight:bold;">Contact: <a href="mailto:" class="email"></a></p>

                </div>
            </div>
        </div>
    </div>




    <?php
    //  query to fetch recruiter first and last names
    $query = "SELECT job_offer.*, Recruiters.companyname,  job_offer.job_description , Recruiters.email
              FROM job_offer 
              JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id 
              LIMIT 6";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Loop through the job offers and display them as carousel items
        while ($row = mysqli_fetch_assoc($result)) {

            $companyname = $row['companyname'];  // Company name
            $job_description = $row['job_description'];
            $email = $row['email'];

            // Job description
    
            // Output the HTML with the variables inserted
    
        }
    }
    ?>



    <!-- Map Image (or actual map integration) -->

    </div>

    </div>
    </div>
    </div>







    <!-- Include Bootstrap JS and jQuery (for modal functionality) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


    <script>
        // Use jQuery to handle the dynamic modal content insertion
        $(document).ready(function () {
            // When the "See More" button is clicked
            $('[data-toggle="modal"]').on('click', function () {
                // Retrieve the data from the clicked job's "See More" button
                var companyname = $(this).data('companyname');
                var job_description = $(this).data('job-description');
                var email = $(this).data('email');

                // Insert the dynamic data into the modal
                $('#departmentModal .companyname').text(companyname);
                $('#departmentModal .job-description').text(job_description);
                $('#departmentModal .email').text(email);

            });
        });

    </script>













    <div class="row mb-5"></div>

    </div>


    <?php
    include('include/footer.php');
    ?>
    <!-- include jQuery to use AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/scroll.js"></script>

    <script type="text/javascript">
        //animation function for ajax data
        function setupObserver() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('show');
                    } else {
                        entry.target.classList.remove('show');
                    }

                });
            });

            const scrollElements = document.querySelectorAll('.scroll1');
            const scrollElements2 = document.querySelectorAll('.scroll2');
            const scrollElements3 = document.querySelectorAll('.scroll3');
            const scrollElements4 = document.querySelectorAll('.scroll4');
            const scrollElements5 = document.querySelectorAll('.scroll5');
            const scrollElements6 = document.querySelectorAll('.scroll6');
            const scrollElements7 = document.querySelectorAll('.scroll7');
            const scrollElements8 = document.querySelectorAll('.scroll8');


            scrollElements.forEach((el) => observer.observe(el));
            scrollElements2.forEach((el) => observer.observe(el));
            scrollElements3.forEach((el) => observer.observe(el));
            scrollElements4.forEach((el) => observer.observe(el));
            scrollElements5.forEach((el) => observer.observe(el));
            scrollElements6.forEach((el) => observer.observe(el));
            scrollElements7.forEach((el) => observer.observe(el));
            scrollElements8.forEach((el) => observer.observe(el));

        }

        /*
             $(document).ready(function() {
                //select the input with the id live_search
                //using the id we can perform an event on the input type
                // Select the input with the id live_search and both select elements
                $("#live_search, #countries, #industries").on('keyup change', function(){
                    var input = $("#live_search").val();
                    var select1 = $("#countries").val();
                    var select2 = $("#industries").val();
        
                    // Now using AJAX with phpmyadmin
            //        if(input != "" || select1 != "" || select2 != ""){
                    // Check if all input fields and select elements are empty
                    if (input === "" && select1 === "" && select2 === "") {
                        // Hide the search result section and return without making an AJAX request
                        $("#searchresult").css("display", "none");
                        return;
                    }
                        // AJAX request
                        $.ajax({
                            url: "phpcode/livesearch3.php",
                            method: "POST",
                            data: {
                                input: input,
                                select1: select1,
                                select2: select2
                            },
                        //using the searchresult id we will display the data coming from livesearch.php
                        //Inside the success function of the AJAX request, we handle the response from the server.
                        success:function(data){
                          //after success function data will be shown in the div section with the id searchresult
                          $("#searchresult").html(data);
                          $("#searchresult").css("display", "block");
                        // Setup Intersection Observer after new content is added
                        setupObserver();
        
                        }
                      });
        
                });
              });
            */
        //jquery code
        $(document).ready(function () {
            var counter = 6;
            //the selector we interact with to load more comments
            //the function will run when we click the btn
            $("#more").click(function () {
                //from where we gonnaload the comments
                //second parameter is like a counter for the query limiter in the load-comments.php
                //seconds parameter pulls up to the file 
                counter = counter + 6;

                //2 cause limit example
                $("#jobs").load("phpcode/all_job_offers.php", {
                    //counter is passed using post method
                    //commentnewcount this the post name
                    morenewjobs: counter
                    //You should place the setupObserver() function call inside the success callback of the $.load() method. This ensures that the animations are set up after the new content has been loaded successfully. 
                }, function () {
                    setupObserver();

                });

            });
        });
        /*$(document).ready(function() {
                //select the input with the id live_search
                //using the id we can perform an event on the input type
                $("#live_search").keyup(function(){
                    //show an alert when typing something
                    var input=$(this).val();
                    //alert(input);
        
                    //now using ajax with phpmyadmin
                    if(input != ""){
                      //ajax stuff
                      $.ajax({
                        url:"phpcode/livesearch.php",
                        method: "POST",
                        data:{input:input},
        
                        //using the searchresult id we will display the data coming from livesearch.php
                        success:function(data){
                          //after success function data will be shown in the div section with the id searchresult
                          $("#searchresult").html(data);
                          $("#searchresult").css("display", "block");
                        // Setup Intersection Observer after new content is added
                        setupObserver();
        
                        }
                      });
                    }else{
                      $("#searchresult").css("display", "none");
        
                    }
                });
              });
              */
    </script>