<?php
include ('session/session_check.php');
include ('header.php');

?>

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
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active"
      aria-current="true"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item"  ;">

      <div class="container">
        <div class="carousel-caption text-start">
          <h1>COMPANY OWNER ?</h1>
          <p class="opacity-75">Sign up today and find trustworthy employees.</p>
          <p><a class="btn btn-lg btn-blue" href="#">Sign up today <svg xmlns="http://www.w3.org/2000/svg" width="25"
                height="25" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
              </svg></a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item" id="yy"  ;">

      <div class="container">
        <div class="carousel-caption text-end">
          <h1 class="text-black text-opacity-75"
            style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">YOUR FUTURE STARTS NOW.</h1>
          <p class="text-black text-opacity-75">Make your dream Job a reality, sign up now and start applying.</p>
          <p><a class="btn btn-lg btn-blue"
              style="color: white; font-weight: bold; font-family: Passion One, sans-serif;" href="#">LEARN MORE <svg
                xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                <path
                  d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
              </svg></a></p>
        </div>
      </div>
    </div>
    <div class="carousel-item active"  ;">
      <div class="container">
        <div class="carousel-caption">
          <h1 style="color: white; font-weight: bold; font-family: Passion One, sans-serif;">FIND JOBS EVERYWHERE AND
            ANYTIME.</h1>
          <p>Seeking employment with no geographical limits, Be ready to dive into any opportunity, anywhere.</p>
          <p><a class="btn btn-lg btn-blue"
              style="color: white; font-weight: bold; font-family: Passion One, sans-serif;" href="#">REGISTER NOW <svg
                xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
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
  <div class="card scroll1 border-blue shadow-lg">
    <div class="card-header display-6 border-blue bg-primary-subtle">
      Search For A Job Offer.
    </div>
    <div class="card-body">

      <div class="row ">
        <h5 class="card-title">You're One Click Away From Changing Your Life</h5>

        <div class="col-lg-4 my-2 my-lg-3">
          <input class="form-control border-blue" id="live_search" type="search" placeholder="Search ..."
            aria-label="Search">
        </div>


        <div class="col-lg-4 my-2 my-lg-3">
          <select class="form-select border-blue" id="industries" name="industries">
            <option value="" selected>Select an industry...</option>
            <option value="">RESET</option>

            <?php
            $industries = array(
              "Accounting",
              "Airlines/Aviation",
              "Alternative Dispute Resolution",
              "Alternative Medicine",
              "Animation",
              "Apparel & Fashion",
              "Architecture & Planning",
              "Arts & Crafts",
              "Automotive",
              "Aviation & Aerospace",
              "Banking",
              "Biotechnology",
              "Broadcast Media",
              "Building Materials",
              "Business Supplies & Equipment",
              "Capital Markets",
              "Chemicals",
              "Civic & Social Organization",
              "Civil Engineering",
              "Commercial Real Estate",
              "Computer & Network Security",
              "Computer Games",
              "Computer Hardware",
              "Computer Networking",
              "Computer Software",
              "Construction",
              "Consumer Electronics",
              "Consumer Goods",
              "Consumer Services",
              "Cosmetics",
              "Dairy",
              "Defense & Space",
              "Design",
              "Education Management",
              "E-Learning",
              "Electrical/Electronic Manufacturing",
              "Entertainment",
              "Environmental Services",
              "Events Services",
              "Executive Office",
              "Facilities Services",
              "Farming",
              "Financial Services",
              "Fine Art",
              "Fishery",
              "Food & Beverages",
              "Food Production",
              "Fund-Raising",
              "Furniture",
              "Gambling & Casinos",
              "Glass, Ceramics & Concrete",
              "Government Administration",
              "Government Relations",
              "Graphic Design",
              "Health, Wellness & Fitness",
              "Higher Education",
              "Hospital & Health Care",
              "Hospitality",
              "Human Resources",
              "Import & Export",
              "Individual & Family Services",
              "Industrial Automation",
              "Information Services",
              "Information Technology & Services",
              "Insurance",
              "International Affairs",
              "International Trade & Development",
              "Internet",
              "Investment Banking",
              "Investment Management",
              "Judiciary",
              "Law Enforcement",
              "Law Practice",
              "Legal Services",
              "Legislative Office",
              "Leisure, Travel & Tourism",
              "Libraries",
              "Logistics & Supply Chain",
              "Luxury Goods & Jewelry",
              "Machinery",
              "Management Consulting",
              "Maritime",
              "Market Research",
              "Marketing & Advertising",
              "Mechanical or Industrial Engineering",
              "Media Production",
              "Medical Devices",
              "Medical Practice",
              "Mental Health Care",
              "Military",
              "Mining & Metals",
              "Motion Pictures & Film",
              "Museums & Institutions",
              "Music",
              "Nanotechnology",
              "Newspapers",
              "Nonprofit Organization Management",
              "Oil & Energy",
              "Online Media",
              "Outsourcing/Offshoring",
              "Package/Freight Delivery",
              "Packaging & Containers",
              "Paper & Forest Products",
              "Performing Arts",
              "Pharmaceuticals",
              "Philanthropy",
              "Photography",
              "Plastics",
              "Political Organization",
              "Primary/Secondary Education",
              "Printing",
              "Professional Training & Coaching",
              "Program Development",
              "Public Policy",
              "Public Relations & Communications",
              "Public Safety",
              "Publishing",
              "Railroad Manufacture",
              "Ranching",
              "Real Estate",
              "Recreational Facilities & Services",
              "Religious Institutions",
              "Renewables & Environment",
              "Research",
              "Restaurants",
              "Retail",
              "Security & Investigations",
              "Semiconductors",
              "Shipbuilding",
              "Sporting Goods",
              "Sports",
              "Staffing & Recruiting",
              "Supermarkets",
              "Telecommunications",
              "Textiles",
              "Think Tanks",
              "Tobacco",
              "Translation & Localization",
              "Transportation/Trucking/Railroad",
              "Utilities",
              "Venture Capital & Private Equity",
              "Veterinary",
              "Warehousing",
              "Wholesale",
              "Wine & Spirits",
              "Wireless",
              "Writing & Editing"
            );

            foreach ($industries as $industry) {
              echo "<option value='$industry'>$industry</option>";
            }
            ?>
          </select>
        </div>


        <div class="col-lg-4 my-2 my-lg-3">
          <select class="form-select border-blue" id="countries" name="countries">
            <option value="" selected>Select a country...</option>
            <option value="">RESET</option>
            <?php
            $countries = array(
              "Afghanistan",
              "Albania",
              "Algeria",
              "Andorra",
              "Angola",
              "Antigua and Barbuda",
              "Argentina",
              "Armenia",
              "Australia",
              "Austria",
              "Azerbaijan",
              "Bahamas",
              "Bahrain",
              "Bangladesh",
              "Barbados",
              "Belarus",
              "Belgium",
              "Belize",
              "Benin",
              "Bhutan",
              "Bolivia",
              "Bosnia and Herzegovina",
              "Botswana",
              "Brazil",
              "Brunei",
              "Bulgaria",
              "Burkina Faso",
              "Burundi",
              "Cabo Verde",
              "Cambodia",
              "Cameroon",
              "Canada",
              "Central African Republic",
              "Chad",
              "Chile",
              "China",
              "Colombia",
              "Comoros",
              "Congo",
              "Costa Rica",
              "Croatia",
              "Cuba",
              "Cyprus",
              "Czech Republic",
              "Denmark",
              "Djibouti",
              "Dominica",
              "Dominican Republic",
              "Ecuador",
              "Egypt",
              "El Salvador",
              "Equatorial Guinea",
              "Eritrea",
              "Estonia",
              "Ethiopia",
              "Fiji",
              "Finland",
              "France",
              "Gabon",
              "Gambia",
              "Georgia",
              "Germany",
              "Ghana",
              "Greece",
              "Grenada",
              "Guatemala",
              "Guinea",
              "Guinea-Bissau",
              "Guyana",
              "Haiti",
              "Honduras",
              "Hungary",
              "Iceland",
              "India",
              "Indonesia",
              "Iran",
              "Iraq",
              "Ireland",
              "Israel",
              "Italy",
              "Jamaica",
              "Japan",
              "Jordan",
              "Kazakhstan",
              "Kenya",
              "Kiribati",
              "Kosovo",
              "Kuwait",
              "Kyrgyzstan",
              "Laos",
              "Latvia",
              "Lebanon",
              "Lesotho",
              "Liberia",
              "Libya",
              "Liechtenstein",
              "Lithuania",
              "Luxembourg",
              "Madagascar",
              "Malawi",
              "Malaysia",
              "Maldives",
              "Mali",
              "Malta",
              "Marshall Islands",
              "Mauritania",
              "Mauritius",
              "Mexico",
              "Micronesia",
              "Moldova",
              "Monaco",
              "Mongolia",
              "Montenegro",
              "Morocco",
              "Mozambique",
              "Myanmar",
              "Namibia",
              "Nauru",
              "Nepal",
              "Netherlands",
              "New Zealand",
              "Nicaragua",
              "Niger",
              "Nigeria",
              "North Korea",
              "North Macedonia",
              "Norway",
              "Oman",
              "Pakistan",
              "Palau",
              "Palestine",
              "Panama",
              "Papua New Guinea",
              "Paraguay",
              "Peru",
              "Philippines",
              "Poland",
              "Portugal",
              "Qatar",
              "Romania",
              "Russia",
              "Rwanda",
              "Saint Kitts and Nevis",
              "Saint Lucia",
              "Saint Vincent and the Grenadines",
              "Samoa",
              "San Marino",
              "Sao Tome and Principe",
              "Saudi Arabia",
              "Senegal",
              "Serbia",
              "Seychelles",
              "Sierra Leone",
              "Singapore",
              "Slovakia",
              "Slovenia",
              "Solomon Islands",
              "Somalia",
              "South Africa",
              "South Korea",
              "South Sudan",
              "Spain",
              "Sri Lanka",
              "Sudan",
              "Suriname",
              "Sweden",
              "Switzerland",
              "Syria",
              "Taiwan",
              "Tajikistan",
              "Tanzania",
              "Thailand",
              "Timor-Leste",
              "Togo",
              "Tonga",
              "Trinidad and Tobago",
              "Tunisia",
              "Turkey",
              "Turkmenistan",
              "Tuvalu",
              "Uganda",
              "Ukraine",
              "United Arab Emirates",
              "United Kingdom",
              "United States",
              "Uruguay",
              "Uzbekistan",
              "Vanuatu",
              "Vatican City",
              "Venezuela",
              "Vietnam",
              "Yemen",
              "Zambia",
              "Zimbabwe"
            );

            foreach ($countries as $country) {
              echo "<option value='$country'>$country</option>";
            }
            ?>
          </select>
        </div>
      </div>
    </div>
  </div>



  <div id="searchresult"></div>




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