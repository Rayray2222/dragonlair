<?php
include('../connection/db.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs</title>

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



<body class="vh-100"
    style="background-image: url('img/careerlink2.png'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">


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
                        <a class="fs-4 nav-link active" aria-current="page" href="jobs.php">CareerLink</a>
                    </li>
                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="jobs.php"
                            style="font-weight: bold; font-family: Roboto;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="#features"
                            style="font-weight: bold; font-family: Roboto;">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="jobs_search.php"
                            style="font-weight: bold; font-family: Roboto;">Search Job</a>
                    </li>

                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="jobs_search.php"
                            style="font-weight: bold; font-family: Roboto;">Departments</a>
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








    <!-- Features Section -->
    <section id="features" class="py-3 py-md-5 py-xl-8 mt-5">
        <div class="container overflow-hidden">
            <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center">
                <!-- Left Side Content: What We Do? -->
                <div class="col-12 col-lg-5">
                    <div class="row">
                        <div class="col-12 col-xl-11" style="background-color: rgba(0, 0, 0, 0.5);">
                            <h3 class="fs-6 text-light mb-3 mb-xl-4 text-uppercase"
                                style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);">What We Do?</h3>
                            <h2 class="display-5 mb-3 mb-xl-4 text-light"
                                style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);">Empowering Alumni with Career
                                Opportunities</h2>
                            <p class="mb-3 mb-xl-4 text-light" style="text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);">
                                Our job portal provides a range of services tailored to help alumni find employment,
                                enhance
                                their resumes, and navigate the job market successfully. Join us to take the next step
                                in your
                                career!

                                <a href="index.php" class="btn bsb-btn-2xl btn-light rounded-pill">Explore
                                    Opportunities</a>
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Right Side Content: Service Cards -->
                <div class="col-12 col-lg-7 overflow-hidden ">
                    <div class="row gy-4">
                        <!-- Job Listings Card -->
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-light shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                        class="bi bi-person-check text-important mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                        <path d="M11 0a1 1 0 0 1 1 1v1H4V1a1 1 0 0 1 1-1h6z" />
                                        <path d="M3 2v4h1V2H3zm0 6v4h1V8H3z" />
                                        <path d="M1 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                    </svg>
                                    <h4 class="mb-4">Job Listings</h4>
                                    <p class="mb-4 text-secondary">Access a wide range of job listings specifically
                                        curated
                                        for our alumni network, from internships to full-time positions.</p>
                                    <a href="jobs_list_all.php" class="fw-bold text-decoration-none link-important">
                                        View Listings
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Resume Building Card -->
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-important shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                        class="bi bi-file-earmark-text text-important mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M9.5 0a.5.5 0 0 1 .5.5V2h2a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h7z" />
                                        <path
                                            d="M5 3h6a1 1 0 0 1 1 1v1H5V4a1 1 0 0 1 1-1zM4 8h8v1H4V8zm0 2h8v1H4v-1z" />
                                    </svg>
                                    <h4 class="mb-4">Resume Building</h4>
                                    <p class="mb-4 text-secondary">Utilize our resume building tools and resources to
                                        create
                                        a standout resume that showcases your skills and experiences.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-important">
                                        Start Building
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Career Workshops Card -->
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-important shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                        class="bi bi-calendar-check text-important mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h9V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H1a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 3v11h14V3H1zm8 7.5a.5.5 0 0 1 .707 0l1 1a.5.5 0 0 1-.707.707l-1-1a.5.5 0 0 1 0-.707z" />
                                    </svg>
                                    <h4 class="mb-4">Career Workshops</h4>
                                    <p class="mb-4 text-secondary">Participate in workshops that enhance your job search
                                        skills,
                                        interview techniques, and networking strategies.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-important">
                                        Join a Workshop
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Alumni Network Card -->
                        <div class="col-12 col-sm-6">
                            <div class="card border-0 border-bottom border-important shadow-sm">
                                <div class="card-body text-center p-4 p-xxl-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor"
                                        class="bi bi-chat-dots text-important mb-4" viewBox="0 0 16 16">
                                        <path
                                            d="M1.5 1.5a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3.5l-2 2a1 1 0 0 1-1-1v-10z" />
                                        <path
                                            d="M3 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                                    </svg>
                                    <h4 class="mb-4">Alumni Network</h4>
                                    <p class="mb-4 text-secondary">Connect with fellow alumni to share experiences,
                                        advice, and job leads through our exclusive alumni network.</p>
                                    <a href="#!" class="fw-bold text-decoration-none link-important">
                                        Join the Network
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container mt-5">

        <div class="row">
            <div class="col-lg-6 mb-4 mt-4  scroll3 ">
                <div class="card border-light-subtle border-5 shadow-lg me-0 me-lg-4 h-100">
                    <img src="img/lookforjob.png" class="card-img-top rounded-0" alt="...">
                    <div class="card-body text-center">

                        <a href="create_candidate.php" class="btn btn-dark btn-lgbtn-lg hover3 fw-bold fs-2"
                            style=" font-weight: bold; font-family: Passion One, sans-serif;">SEARCH FOR A JOB</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 mt-4 scroll2 ">
                <div class="card border- white border-5 shadow-lg ms-0 ms-lg-4  h-100">
                    <img src="img/careerlinklogo.png" class="card-img-top rounded-0" alt="...">
                    <div class="card-body text-center">

                        <a href="create_recruiter.php" class="btn btn-dark btn-lg hover3 fw-bold fs-2 "
                            style=" font-weight: bold; font-family: Passion One, sans-serif;">POST A JOB</a>
                    </div>
                </div>
            </div>
        </div>



    </div>








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


        $(document).ready(function () {
            //select the input with the id live_search
            //using the id we can perform an event on the input type
            // Select the input with the id live_search and both select elements
            $("#live_search, #countries, #industries").on('keyup change', function () {
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
                    success: function (data) {
                        //after success function data will be shown in the div section with the id searchresult
                        $("#searchresult").html(data);
                        $("#searchresult").css("display", "block");
                        // Setup Intersection Observer after new content is added
                        setupObserver();

                    }
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