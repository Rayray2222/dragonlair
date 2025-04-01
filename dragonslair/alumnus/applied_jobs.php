<?php
include('session/session_check.php');
include('include/header.php');

include('magic_menu.php');

?>



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





<link href="css/create_candidate.css" rel="stylesheet">

<div class=" container-lg col-md-12 col-lg-7 mt-4">
    <div class="daform2">
        <div class="card border-primary scroll4 shadow-lg">
            <h5 class="card-header text-center fs-2 border-blue bg-blue"
                style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">APPLIED JOBS</h5>
            <div class="card-body bg-primary-subtle">
                <?php
                include('../connection/db.php');
                $can_id = $_SESSION['can_id'];
                $query = mysqli_query($conn, "SELECT * FROM applied_jobs a INNER JOIN job_offer j ON a.Job_id = j.job_id INNER JOIN Recruiters r ON r.rec_id = j.rec_id WHERE a.Can_id = $can_id");
                while ($row = mysqli_fetch_array($query)) {
                    $job_title = $row['job_title'];
                    $job_description = $row['job_description'];
                    $rec_img = $row['rec_img'];
                    $companyname = $row['companyname'];
                    $statut = $row['statut'];
                    ?>

                    <div class="card shadow-lg mb-3">
                        <div class="card-header fs-4 fw-bold text-dark-subtle">
                            <?php echo "JOB TITLE: $job_title"; ?>

                        </div>
                        <div class="card-body">
                            <div class=" d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                                <img class="comp-logo mr-4 mb-3" src="<?php echo $rec_img ?> ">
                                <h6><?php echo $companyname ?></h6>

                                <h5 class="card-title col-lg-7"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-layers-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M7.765 1.559a.5.5 0 0 1 .47 0l7.5 4a.5.5 0 0 1 0 .882l-7.5 4a.5.5 0 0 1-.47 0l-7.5-4a.5.5 0 0 1 0-.882z" />
                                        <path
                                            d="m2.125 8.567-1.86.992a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882l-1.86-.992-5.17 2.756a1.5 1.5 0 0 1-1.41 0z" />
                                    </svg>
                                    <?php echo $job_description ?>
                                </h5>
                                <span class="btn btn-info">

                                    <?php echo "$statut" ?>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>

        </div>
    </div>
</div>









<div class="row mb-5"></div>
<div class="row mt-5 mb-3 scroll8">






    <?php
    include('include/footer.php'); ?>