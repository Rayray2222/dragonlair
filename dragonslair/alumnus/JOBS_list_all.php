<?php
include('session/session_check.php');
include('include/header.php');

include('../connection/db.php');

?>
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

    .image-carousel.style2 {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
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
<style type="text/css">
    .carousel-item {
        height: 25rem;
        background: rgb(83, 134, 35);
        position: relative;
        background-color: rgb(81, 129, 53);
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
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">

    </div>
    <div class="carousel-inner">
        <div class="carousel-item" style="background-image:url() ;">

        </div>
        <div class="carousel-item active" style="background-image:url() ;">
            <h1>Welcome Alumni</h1>
        </div>
    </div>

</div>






<div class="row">
    <h5 class="display-4 text-center scroll8" </h5>
</div>

<div class="job-section-container" style="text-align: center;">
    <!-- Job Listing Carousel -->
    <div class="image-carousel style2 flexslider" data-animation="slide" data-item-width="270" data-item-margin="30">
        <div class="flex-viewport" style="overflow: hidden; position: relative;">
            <ul class="slides image-box hotel listing-style1"
                style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-300px, 0px, 0px);">
                <?php
                // Updated query to fetch recruiter first and last names
                $query = "SELECT job_offer.*, Recruiters.rec_fname, Recruiters.rec_lname , Recruiters.companyname , Recruiters.email
                  FROM job_offer 
                  JOIN Recruiters ON job_offer.rec_id = Recruiters.rec_id 
                  LIMIT 6";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    // Loop through the job offers and display them as carousel items
                    while ($row = mysqli_fetch_assoc($result)) {
                        $job_title = $row['job_title'];
                        $companyname = $row['companyname'];  // Company name
                        $job_type = $row['job_type'];
                        $job_description = $row['job_description'];  // Job description
                        $salary = $row['salary']; // Salary
                        $rec_fname = $row['rec_fname']; // Recruiter's first name
                        $rec_lname = $row['rec_lname']; // Recruiter's last name
                
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
                                        <img width="270" height="160" alt="Job Image" src="https://via.placeholder.com/270x160"
                                            draggable="false">
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
                                        <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="4 stars">
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
                                        <a href="APPLY_NOW.php?job=<?php echo $row['job_id']; ?>" class="button btn-small">APPLY
                                            NOW!</a>


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
    <div class="row">
        <style type="text/css">
            #more {
                display: block;
                width: 20%;
                margin: 0 auto;
            }

            @media (max-width: 991px) {
                #more {
                    width: 30%;
                }
            }

            @media (max-width: 539px) {
                #more {
                    width: 45%;
                }
            }

            @media (max-width: 768px) {
                #more {
                    width: 45%;
                }
            }
        </style>
        <button class="btn fs-2 btn-dark btn-block mt-4 rounded-5 pb-1 shadow-lg hover3 scroll8"
            style=" font-weight: bold; font-family: Passion One, sans-serif;" id="more">SHOW MORE</button>
    </div>

</div>


</div>















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



                <?php
                // Updated query to fetch recruiter first and last names
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
                

                    }
                }// Recruiter's last name ?>
                <h2 class="box-title" style="font-weight:bold;text-align:center">
                    <?php echo $companyname; ?>
                </h2>
                <br>
                <h4 style="text-align:center;font-weight-bold;"> </h4>

                <p><?php echo $job_description; ?></p>
                <p style="font-weight:bold;">Contact: <a href="mailto:brad@example.com"><?php echo $email; ?></a></p>

                <!-- Map Image (or actual map integration) -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<!-- Include Bootstrap JS and jQuery (for modal functionality) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>





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