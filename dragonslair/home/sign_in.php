<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In / Create Account</title>

    <!-- Fonts -->
    <style type="text/css">
        @font-face {
            font-family: 'Bungee Shade';
            src: url('fonts/Bungee_Shade/BungeeShade-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Oswald';
            src: url('fonts/Oswald/static/Oswald-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Passion One';
            src: url('fonts/Passion_One/PassionOne-Bold.ttf') format('truetype');
        }
    </style>

    <!-- External Styles -->
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="css/logoscroll.css">
    <link rel="stylesheet" type="text/css" href="css/scroll.css">
    <link rel="stylesheet" type="text/css" href="css/hoverr.css">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Oswald', sans-serif;
            background: #f7f7f7;
            height: 100vh;
            padding-top: 6rem;
            /* Added padding to the body to move everything slightly lower */
        }

        .form-signin {
            max-width: 400px;
            padding: 1.5rem;
            margin: auto;
            margin-top: 7rem;
            /* Increased margin-top to move forms lower */
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            animation: fadeIn 1s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .form-signin .form-floating {
            margin-bottom: 1rem;
        }

        .form-signin input {
            font-size: 1rem;
        }

        .form-signin .btn {
            font-size: 1.2rem;
            padding: 0.8rem;
            font-family: 'Passion One', sans-serif;
            background-color: #E4D611;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-signin .btn:hover {
            background-color: #D3C210;
        }

        .form-signin .btn:active {
            background-color: #B3A700;
        }

        .form-signin .btn:focus {
            box-shadow: none;
        }

        .form-signin a {
            display: block;
            text-align: center;
            font-size: 1rem;
            color: #333;
            text-decoration: none;
            margin-top: 10px;
        }

        .form-signin a:hover {
            color: #E4D611;
            font-weight: bold;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            gap: 2rem;
        }

        .form-container .col-lg-6 {
            width: 48%;
            opacity: 0;
            animation: slideIn 1s forwards;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container .col-lg-6:nth-child(1) {
            animation-delay: 0.2s;
        }

        .form-container .col-lg-6:nth-child(2) {
            animation-delay: 0.4s;
        }

        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            background-color: #E4D611;
            color: white;
            text-align: center;
            padding: 1rem;
            border-radius: 8px 8px 0 0;
        }

        .scroll5 {
            border-radius: 8px;
        }
    </style>
</head>

<body>
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
                            <a class="fs-4 nav-link active" aria-current="page" href="index.php">CareerLink</a>
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


                    </ul>
                </div>

                <!-- Right-aligned navbar items (About, Login) -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="#" style="font-weight: bold; font-family: Roboto;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="fs-5 nav-link" href="sign_in.php"
                            style="font-weight: bold; font-family: Roboto;">Login
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 2 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Sign In / Create Account Section -->
        <div class="container">
            <div class="row form-container">
                <!-- Faculty Sign In -->
                <div class="col-lg-6">
                    <form action="phpcode/rec_sign_in.php" method="POST" class="form-signin" id="faculty-signin">
                        <div class="card scroll5">
                            <h5 class="card-header">Faculty</h5>
                            <div class="card-body">
                                <h3 class="h3 mb-3 fw-normal">Please sign in</h3>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email address" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control mb-3" id="pass" name="pass"
                                        placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button class="btn w-100" type="submit" name="submit">Sign in</button>
                                <a href="create_faculty.php" class="mt-3">Create an Account</a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Alumni Sign In -->
                <div class="col-lg-6">
                    <form action="phpcode/can_sign_in.php" method="POST" class="form-signin" id="alumni-signin">
                        <div class="card scroll5">
                            <h5 class="card-header">Alumni</h5>
                            <div class="card-body">
                                <h3 class="h3 mb-3 fw-normal">Please sign in</h3>
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email address" required>
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control mb-3" id="pass" name="pass"
                                        placeholder="Password" required>
                                    <label for="floatingPassword">Password</label>
                                </div>
                                <button class="btn w-100" type="submit" name="submit">Sign in</button>
                                <a href="create_alumni.php" class="mt-3">Create an Account</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Footer (optional) -->
        <?php include('include/footer.php'); ?>



    </body>

    </html>