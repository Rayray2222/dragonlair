<?php
include('../connection/db.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CareerLink</title>

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




        .container {
            margin-top: 200px
        }

        .btn {
            display: inline-block;
            margin-right: 20px;
            letter-spacing: 2px;
            border: 1px solid transparent
        }

        .btn-round {
            border-radius: 4px !important
        }

        .btn i {
            margin-right: 5px
        }



        .btn.btn-medium {
            font-size: 14px;
            padding: 10px 22px
        }



        .highlight-button {
            border: 2px solid #000;
            display: inline-block;
            padding: 8px 20px 9px;
            font-size: 12px;
            color: #000;
            background-color: transparent
        }

        .highlight-button:hover {
            background-color: #000;
            border: 2px solid #000;
            color: #fff
        }

        .highlight-button i {
            color: #000
        }

        .highlight-button:hover i {
            color: #fff
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
                        <a class="fs-5 nav-link" href="index.php"
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
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                class=""></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active"
                aria-current="true"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item" style="">

                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>COMPANY OWNER ?</h1>
                        <p class="opacity-75">Sign up today and find trustworthy employees.</p>
                        <p><a class="btn btn-lg btn-dark" href="#">Sign up today <svg xmlns="http://www.w3.org/2000/svg"
                                    width="25" height="25" fill="currentColor" class="bi bi-arrow-right"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                                </svg></a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item" id="yy" style="">

                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1 class="text-black text-opacity-75"
                            style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">YOUR FUTURE
                            STARTS NOW.</h1>
                        <p class="text-black text-opacity-75">Make your dream Job a reality, sign up now and start
                            applying.</p>
                        <p><a class="btn btn-lg btn-dark"
                                style="color: white; font-weight: bold; font-family: Passion One, sans-serif;"
                                href="#">LEARN MORE <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                    fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item active" style="">
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">FIND JOBS
                            EVERYWHERE AND ANYTIME.</h1>
                        <p>Seeking employment with no geographical limits, Be ready to dive into any opportunity,
                            anywhere.</p>
                        <p><a class="btn btn-lg btn-dark"
                                style="color: white; font-weight: bold; font-family: Passion One, sans-serif;"
                                href="#">REGISTER NOW
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                    class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                                </svg></a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



    <div class="container mt-5">

        <!-- JOB search BAR all/field/location -->
        <div class="card scroll1 border-dark shadow-lg">
            <div class="card-header display-6 border-dark bg-dark-subtle">
                Search For A Job Offer.
            </div>
            <div class="card-body">

                <div class="row ">
                    <h5 class="card-title">You're One Click Away From Changing Your Life</h5>

                    <div class="col-lg-4 my-2 my-lg-3">
                        <input class="form-control border-dark" id="live_search" type="search" placeholder="Search ..."
                            aria-label="Search">
                    </div>

                    <div class="col-lg-4 my-2 my-lg-3">
                        <select class="form-select border-dark" id="industries" name="industries">
                            <option value="" selected>Select an industry...</option>
                            <option value="">RESET</option>
                            <?php
                            $industries = array(
                                "Accounting",
                                "Airlines/Aviation",
                                "Animation",
                                "Architecture & Planning",
                                "Arts & Crafts",
                                "Banking",
                                "Civil Engineering",
                                "Fine Art",


                                "Hospital & Health Care",
                                "Hospitality",
                                "Information Technology & Services",
                                "Libraries",
                                "Marketing & Advertising",
                                "Media Production",
                                "Mental Health Care",
                                "Military",
                                "Music",
                                "Translation & Localization",
                                "Writing & Editing"
                            );
                            foreach ($industries as $industry) {
                                echo "<option value='$industry'>$industry</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-lg-4 my-2 my-lg-3">
                        <select class="form-select border-dark" id="salaries" name="salaries">
                            <option value="" selected>Select Salary...</option>
                            <option value="">RESET</option>
                            <?php
                            $salaries = array("Full Time", "Part Time");
                            foreach ($salaries as $salary) {
                                echo "<option value='$salary'>$salary</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Button to list all jobs -->
                    <a href="javascript:void(0);" class="highlight-button btn btn-medium button xs-margin-bottom-five"
                        id="list-all-jobs">
                        <i class="fa fa-warning"></i> List all Jobs
                    </a>
                </div>
            </div>
        </div>

        <!-- The div where the job results will be displayed -->
        <div id="searchresult"></div>

    </div>



















    <script>
        document.getElementById('list-all-jobs').addEventListener('click', function () {
            // Send an AJAX request to the PHP script that fetches all the job offers
            fetch('list_all_jobs.php')
                .then(response => response.text())
                .then(data => {
                    // Insert the fetched job listings into the searchresult div
                    document.getElementById('searchresult').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
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


        $(document).ready(function () {
            //select the input with the id live_search
            //using the id we can perform an event on the input type
            // Select the input with the id live_search and both select elements
            $("#live_search, #salaries, #industries").on('keyup change', function () {
                var input = $("#live_search").val();
                var select1 = $("#salaries").val();
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