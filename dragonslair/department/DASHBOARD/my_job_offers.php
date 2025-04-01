<?php
include('include/header.php');
include('include/sidebar.php');

// Make sure the recruiter is logged in, otherwise redirect
if (!isset($_SESSION['rec_id'])) {
  header("Location: login.php");
  exit();
}

$rec_id = $_SESSION['rec_id']; // Get the logged-in recruiter ID

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4 pb-2 mb-1">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="rec_dashboard.php">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">My Job Offers</li>
    </ol>
  </nav>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-1 border-bottom">
    <h1 class="h2"></h1>
  </div>

  <div class="container-fluid"></div>

  <!-- Success card message -->
  <?php
  if (isset($_SESSION['status'])) {
    ?>
    <div class="alert alert-danger d-flex mt-4 container-fluid" role="alert">
      <i class="bi bi-trash-fill"></i>
      <div>
        &nbsp;<?php echo $_SESSION['status']; ?>
      </div>
    </div>
    <?php
    unset($_SESSION['status']);
  }
  ?>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
    $main-green: #79dd09 !default;
    $main-green-rgb-015: rgba(121, 221, 9, 0.1) !default;
    $main-yellow: #bdbb49 !default;
    $main-yellow-rgb-015: rgba(189, 187, 73, 0.1) !default;
    $main-red: #bd150b !default;
    $main-red-rgb-015: rgba(189, 21, 11, 0.1) !default;
    $main-blue: #0076bd !default;
    $main-blue-rgb-015: rgba(0, 118, 189, 0.1) !default;

    /* This pen */
    body {
      font-family: "Baloo 2", cursive;
      font-size: 16px;
      color: #ffffff;
      text-rendering: optimizeLegibility;
      font-weight: initial;
    }

    .dark {
      background: #110f16;
    }


    .light {
      background: #f3f5f7;
    }

    a,
    a:hover {
      text-decoration: none;
      transition: color 0.3s ease-in-out;
    }

    #pageHeaderTitle {
      margin: 2rem 0;
      text-transform: uppercase;
      text-align: center;
      font-size: 2.5rem;
    }

    /* Cards */
    .postcard {
      flex-wrap: wrap;
      display: flex;

      box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
      border-radius: 10px;
      margin: 0 0 2rem 0;
      overflow: hidden;
      position: relative;
      color: #ffffff;

      &.dark {
        background-color: #18151f;
      }

      &.light {
        background-color: #e1e5ea;
      }

      .t-dark {
        color: #18151f;
      }

      a {
        color: inherit;
      }

      h1,
      .h1 {
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
      }

      .small {
        font-size: 80%;
      }

      .postcard__title {
        font-size: 1.75rem;
      }

      .postcard__img {
        max-height: 180px;
        width: 100%;
        object-fit: cover;
        position: relative;
      }

      .postcard__img_link {
        display: contents;
      }

      .postcard__bar {
        width: 50px;
        height: 10px;
        margin: 10px 0;
        border-radius: 5px;
        background-color: #424242;
        transition: width 0.2s ease;
      }

      .postcard__text {
        padding: 1.5rem;
        position: relative;
        display: flex;
        flex-direction: column;
      }

      .postcard__preview-txt {
        overflow: hidden;
        text-overflow: ellipsis;
        text-align: justify;
        height: 100%;
      }

      .postcard__tagbox {
        display: flex;
        flex-flow: row wrap;
        font-size: 14px;
        margin: 20px 0 0 0;
        padding: 0;
        justify-content: center;

        .tag__item {
          display: inline-block;
          background: rgba(83, 83, 83, 0.4);
          border-radius: 3px;
          padding: 2.5px 10px;
          margin: 0 5px 5px 0;
          cursor: default;
          user-select: none;
          transition: background-color 0.3s;

          &:hover {
            background: rgba(83, 83, 83, 0.8);
          }
        }
      }

      &:before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(-70deg, #424242, transparent 50%);
        opacity: 1;
        border-radius: 10px;
      }

      &:hover .postcard__bar {
        width: 100px;
      }
    }

    @media screen and (min-width: 769px) {
      .postcard {
        flex-wrap: inherit;

        .postcard__title {
          font-size: 2rem;
        }

        .postcard__tagbox {
          justify-content: start;
        }

        .postcard__img {
          max-width: 300px;
          max-height: 100%;
          transition: transform 0.3s ease;
        }

        .postcard__text {
          padding: 3rem;
          width: 100%;
        }

        .media.postcard__text:before {
          content: "";
          position: absolute;
          display: block;
          background: #18151f;
          top: -20%;
          height: 130%;
          width: 55px;
        }

        &:hover .postcard__img {
          transform: scale(1.1);
        }

        &:nth-child(2n+1) {
          flex-direction: row;
        }

        &:nth-child(2n+0) {
          flex-direction: row-reverse;
        }

        &:nth-child(2n+1) .postcard__text::before {
          left: -12px !important;
          transform: rotate(4deg);
        }

        &:nth-child(2n+0) .postcard__text::before {
          right: -12px !important;
          transform: rotate(-4deg);
        }
      }
    }

    @media screen and (min-width: 1024px) {
      .postcard__text {
        padding: 2rem 3.5rem;
      }

      .postcard__text:before {
        content: "";
        position: absolute;
        display: block;

        top: -20%;
        height: 130%;
        width: 55px;
      }

      .postcard.dark {
        .postcard__text:before {
          background: #18151f;
        }
      }

      .postcard.light {
        .postcard__text:before {
          background: #e1e5ea;
        }
      }
    }

    /* COLORS */
    .postcard .postcard__tagbox .green.play:hover {
      background: $main-green;
      color: black;
    }

    .green .postcard__title:hover {
      color: $main-green;
    }

    .green .postcard__bar {
      background-color: $main-green;
    }

    .green::before {
      background-image: linear-gradient(-30deg,
          $main-green-rgb-015,
          transparent 50%);
    }

    .green:nth-child(2n)::before {
      background-image: linear-gradient(30deg, $main-green-rgb-015, transparent 50%);
    }

    .postcard .postcard__tagbox .blue.play:hover {
      background: $main-blue;
    }

    .blue .postcard__title:hover {
      color: $main-blue;
    }

    .blue .postcard__bar {
      background-color: $main-blue;
    }

    .blue::before {
      background-image: linear-gradient(-30deg, $main-blue-rgb-015, transparent 50%);
    }

    .blue:nth-child(2n)::before {
      background-image: linear-gradient(30deg, $main-blue-rgb-015, transparent 50%);
    }

    .postcard .postcard__tagbox .red.play:hover {
      background: $main-red;
    }

    .red .postcard__title:hover {
      color: $main-red;
    }

    .red .postcard__bar {
      background-color: $main-red;
    }

    .red::before {
      background-image: linear-gradient(-30deg, $main-red-rgb-015, transparent 50%);
    }

    .red:nth-child(2n)::before {
      background-image: linear-gradient(30deg, $main-red-rgb-015, transparent 50%);
    }

    .postcard .postcard__tagbox .yellow.play:hover {
      background: $main-yellow;
      color: black;
    }

    .yellow .postcard__title:hover {
      color: $main-yellow;
    }

    .yellow .postcard__bar {
      background-color: $main-yellow;
    }

    .yellow::before {
      background-image: linear-gradient(-30deg,
          $main-yellow-rgb-015,
          transparent 50%);
    }

    .yellow:nth-child(2n)::before {
      background-image: linear-gradient(30deg,
          $main-yellow-rgb-015,
          transparent 50%);
    }

    @media screen and (min-width: 769px) {
      .green::before {
        background-image: linear-gradient(-80deg,
            $main-green-rgb-015,
            transparent 50%);
      }

      .green:nth-child(2n)::before {
        background-image: linear-gradient(80deg,
            $main-green-rgb-015,
            transparent 50%);
      }

      .blue::before {
        background-image: linear-gradient(-80deg,
            $main-blue-rgb-015,
            transparent 50%);
      }

      .blue:nth-child(2n)::before {
        background-image: linear-gradient(80deg, $main-blue-rgb-015, transparent 50%);
      }

      .red::before {
        background-image: linear-gradient(-80deg, $main-red-rgb-015, transparent 50%);
      }

      .red:nth-child(2n)::before {
        background-image: linear-gradient(80deg, $main-red-rgb-015, transparent 50%);
      }

      .yellow::before {
        background-image: linear-gradient(-80deg,
            $main-yellow-rgb-015,
            transparent 50%);
      }

      .yellow:nth-child(2n)::before {
        background-image: linear-gradient(80deg,
            $main-yellow-rgb-015,
            transparent 50%);
      }
    }
  </style>







  <!-- Job Offers -->
<section class="dark">
  <div class="container py-4">
    <?php
    include('connection/db.php');

    // Fetch job offers that belong to the logged-in recruiter
    $query = mysqli_query($conn, "SELECT * FROM job_offer j INNER JOIN Recruiters r ON r.rec_id = j.rec_id WHERE j.status = 1 AND j.rec_id = '$rec_id'");

    // Check if there are any job offers
    if (mysqli_num_rows($query) > 0) {
      while ($row = mysqli_fetch_array($query)) {
        ?>

        <article class="postcard dark blue">
          <!-- Image link -->
          <a class="postcard__img_link" href="#">
            <img class="postcard__img" src="https://picsum.photos/1000/1000" alt="Job Offer Image" />
          </a>
          <div class="postcard__text">
            <!-- Job title and link -->
            <h1 class="postcard__title blue">
              <a href="job_applicants.php?job_id=<?php echo $row['job_id']; ?>"><?php echo $row['job_title']; ?></a>
            </h1>
            <!-- Job date/time -->
            <div class="postcard__subtitle small">
              <time datetime="2020-05-25 12:00:00">
                <i class="fas fa-calendar-alt mr-2"></i>Posted:
                <?php echo date("M j, Y", strtotime($row['creation_date'])); ?>
              </time>
            </div>
            <div class="postcard__bar"></div>
            <!-- Job Description Preview -->
            <div class="postcard__preview-txt">
              <?php echo substr($row['job_description'], 0, 150) . "..."; ?>
            </div>
            <ul class="postcard__tagbox">
              <!-- Salary Tag -->
              <li class="tag__item">
                <i class="fas fa-peso-sign mr-2"></i><?php echo "₱" . $row['salary']; ?>
              </li>
              <!-- Job Type Tag -->
              <li class="tag__item">
                <i class="fas fa-briefcase mr-2"></i><?php echo $row['job_type']; ?>
              </li>
              <!-- Apply Link -->
              <li class="tag__item play blue">
                <a href="job_applicants.php?job_id=<?php echo $row['job_id']; ?>">Applicants</a>
              </li>

              
              <!-- Delete Button -->
              <li class="tag__item play red">
                <a href="delete.job.php?job_id=<?php echo $row['job_id']; ?>" onclick="return confirm('Are you sure you want to delete this job offer?');">Delete</a>
              </li>
            </ul>
          </div>
        </article>

        <?php
      }
    } else {
      echo "<p>No job offers available at the moment.</p>";
    }
    ?>
  </div>
</section>





















</main>
</div>
</div>
</div>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
  integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
<script src="js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
<script type="text/javascript">
  new DataTable('#example', {
    responsive: true
  });
</script>

</body>

</html>