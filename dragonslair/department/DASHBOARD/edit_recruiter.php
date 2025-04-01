<?php
include('include/header.php');
include('include/sidebar.php');
include('../../connection/db.php');
$recid = $_SESSION['rec_id'];
?>

<?php
// $edit=$_GET['edit'];
$edit = $_SESSION['rec_id'];

$query = mysqli_query($conn, "select * from Recruiters where rec_id='$edit'");

while ($row = mysqli_fetch_array($query)) {
    $email = $row['email'];
    $username = $row['username'];
    $rec_fname = $row['rec_fname'];
    $rec_lname = $row['rec_lname'];
    $password = $row['password'];
    $companyname = $row['companyname'];
    $industry = $row['industry'];
    $website = $row['website'];
    $description = $row['description'];
    $phone = $row['phone'];
    $address = $row['address'];
    $city = $row['city'];
    $country = $row['country'];
    $zip = $row['zip_code'];
    $foundation = $row['Foundation'];
    $imageeData = $row['rec_img'];
}

?>


<div class=" container-lg col-md-12 col-lg-7 mt-4">
    <div class="daform2">

        <!-- success card stuff -->
        <?php
        if (isset($_SESSION['status'])) {
            ?>
            <div class="alert alert-success d-flex align-items-center mt-4 container-lg col-md-12 col-lg-7" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
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
        <form action="../phpcode/edit_recruiter_code.php" method="POST" class="needs-validation" novalidate=""
            name="admin_form">


            <div class="card scroll4 border-yellow shadow-lg">
                <h5 class="card-header border-yellow text-center fs-2 bg-yellow"
                    style=" font-weight: bold; font-family: Passion One, sans-serif;">EDIT YOUR ACCOUNT DETAILS</h5>
                <div class="card-body">
                    <div class="">
                        <div class="row g-3">


                        <div class="col-12">
                <label for="rec_img" class="form-label">Profile Picture</label>
                <div class="profile-picture col-12">
                            <?php
                            // Output the image directly
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($imageeData) . '" alt="Profile Picture">';
                            ?>
                        </div>
              </div>

                            <div class="col-12">
                                <label for="Username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="Username" required="" value="<?php echo $username; ?>">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>



                            <div class="col-12">
                                <label for="Username" class="form-label">Name</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="rec_fname" name="rec_fname"
                                        placeholder="Username" required="" value="<?php echo $rec_fname; ?>">
                                    <div class="invalid-feedback">
                                        Your name is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="Username" class="form-label">Last Name</label>
                                <div class="input-group has-validation">

                                    <input type="text" class="form-control" id="rec_lname" name="rec_lname"
                                        placeholder="Username" required="" value="<?php echo $rec_lname; ?>">
                                    <div class="invalid-feedback">
                                        Your last name is required.
                                    </div>
                                </div>
                            </div>


                            <div class="col-12">
                                <label for="Email" class="form-label">Email <span
                                        class="text-body-secondary"></span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="you@example.com" required="" value="<?php echo $email; ?>">
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder=""
                                    required="" value="<?php echo $password; ?>">
                                <div class="invalid-feedback">
                                    Please enter your password.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="firstName" class="form-label">Company name</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder=""
                                    value="<?php echo $companyname; ?>" required="">
                                <div class="invalid-feedback">
                                    Valid Company name is required.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Industry</label>
                                <select class="form-select" id="industry" name="industry" required="">
                                    <option value="" disabled selected>Choose...</option>
                                    <?php
                                    $industries = array(

                                    );

                                    foreach ($industries as $industry_before) {
                                        echo "<option value='$industry_before'";
                                        if ($industry_before === $industry) {
                                            echo ' selected';
                                        }
                                        echo ">$industry_before</option>";
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please choose the company's industry.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="basic-url" class="form-label">Your Company's WEBSITE</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">https://example.com</span>
                                    <input type="text" class="form-control" id="website" name="website"
                                        aria-describedby="basic-addon3 basic-addon4" placeholder="" required=""
                                        value="<?php echo $website; ?>">
                                </div>
                                <div class="form-text" id="basic-addon4">write the domain with the https.</div>
                                <div class="invalid-feedback">
                                    Please enter the company's website.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    style="height: 150px;" placeholder=""
                                    required=""><?php echo $description; ?></textarea>
                                <div class="invalid-feedback">
                                    Please enter the company's description.
                                </div>

                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder=""
                                    required="" value="<?php echo $phone; ?>">
                                <div class="invalid-feedback">
                                    Please enter the company's phone number.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder=""
                                    required="" value="<?php echo $address; ?>">
                                <div class="invalid-feedback">
                                    Please enter the company's address.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="" required=""
                                    value="<?php echo $city; ?>">
                                <div class="invalid-feedback">
                                    Please enter the city.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Country</label>
                                <select class="form-select" id="country" name="country" required="">
                                    <option value="" disabled selected>Choose...</option>
                                    <?php
                                    $countries = array(
                                        "Philippines"
                                    );

                                    foreach ($countries as $country_before) {
                                        echo "<option value='$country_before'";
                                        if ($country_before === $country) {
                                            echo ' selected';
                                        }
                                        echo ">$country_before</option>";
                                    }
                                    ?>

                                </select>
                                <div class="invalid-feedback">
                                    Please enter the address.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="" required=""
                                    value="<?php echo $zip; ?>">
                                <div class="invalid-feedback">
                                    Please enter your Zip.
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="form-label">Date Of Foundation</label>
                                <input type="date" class="form-control" id="foundation" name="foundation" placeholder=""
                                    required="" value="<?php echo $foundation; ?>">
                                <div class="invalid-feedback">
                                    Please enter the foundation date.
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id" value="<?php echo $edit; ?>">

                        </div>
                        <hr class="my-4">
                        <input type="submit" class="w-100 fs-3 btn btn-blue hover3" placeholder="save" value="Confirm"
                            name="submit" id="submit" style=" font-weight: bold; font-family: Passion One, sans-serif;">
                    </div>
                </div>
        </form>
    </div>
</div>

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
                url: "phpcode/candidate_search_code.php",
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