<?php
include ('session/session_check.php');
include('include/header.php');


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

<div class="container mt-5">

  <div class="row">
    <div class="col-lg-6 mb-4 mt-4  scroll3 ">
      <div class="card border-light-subtle border-5 shadow-lg me-0 me-lg-4 h-100">
        <img src="img/lookforjob.png" class="card-img-top rounded-0" alt="...">
        <div class="card-body text-center">

          <a href="JOBS_search.php" class="btn btn-dark btn-lg hover3 fw-bold fs-2 hovver"
            style=" font-weight: bold; font-family: Passion One, sans-serif;">SEARCH FOR A JOB</a>
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-4 mt-4 scroll2 ">
      <div class="card border-dark border-5 shadow-lg ms-0 ms-lg-4  h-100">
        <img src="img/careerlinklogo.png" class="card-img-top rounded-0" alt="...">
        <div class="card-body text-center">

          <a href="JOBS_list_all.php" class="btn btn-dark btn-lg hover3 fw-bold fs-2 "
            style=" font-weight: bold; font-family: Passion One, sans-serif;">LIST ALL JOB OFFERS</a>
        </div>
      </div>
    </div>
  </div>



</div>










<?php
include ('include/footer.php');
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