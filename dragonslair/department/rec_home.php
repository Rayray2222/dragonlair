<?php 
include('session/session_check.php');
include('header.php');

 ?>



<style type="text/css">
  .carousel-item {
    height: 25rem;
    background: #ffffff;
    position: relative;
    background-color: gray;
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
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active" aria-current="true"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item" ">
    
        <div class="container">
          <div class="carousel-caption text-start">
            <h1>COMPANY OWNER ?</h1>
            <p class="opacity-75">Sign up today and find trustworthy employees.</p>
            <p><a class="btn btn-lg btn-blue" href="#">Sign up today <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
</svg></a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item" id="yy"  ">
        
        <div class="container">
          <div class="carousel-caption text-end">
            <h1 class="text-black text-opacity-75" style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">YOUR FUTURE STARTS NOW.</h1>
            <p class="text-black text-opacity-75">Make your dream Job a reality, sign up now and start applying.</p>
            <p><a class="btn btn-lg btn-blue" style="color: white; font-weight: bold; font-family: Passion One, sans-serif;" href="#">LEARN MORE <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
</svg></a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item active"     ;"
>
        <div class="container">
          <div class="carousel-caption">
            <h1 style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">FIND JOBS EVERYWHERE AND ANYTIME.</h1>
            <p>Seeking employment with no geographical limits, Be ready to dive into any opportunity, anywhere.</p>
            <p><a class="btn btn-lg btn-blue" style="color: white; font-weight: bold; font-family: Passion One, sans-serif;" href="#">REGISTER NOW <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
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





<?php 
include('include/footer.php'); ?>