<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- My CSS -->
	  <link rel="stylesheet" href="src/frontend/css/style.css" type="text/css">

    <title>Treck</title>
</head>

<body>
	<!-- Check session -->
	<?php
		if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
			echo '<ul class="err">';
			foreach($_SESSION['ERRMSG_ARR'] as $msg) {
				echo '<li>',$msg,'</li>';
			}
			echo '</ul>';
			unset($_SESSION['ERRMSG_ARR']);
		}
	?>

  <!-- ****************************HEADER*********************************** -->
  <!-- Header -->
  <div class="container-fluid">
    <div class="row">
      <!-- Logo place -->
      <div class="col-3 logoCell">
        <a href="/index.html"><img src="images/logoSmall115.png" alt="treck logo"></a>
      </div>

      <!-- Title -->
      <div class="col-6  titleCell" align="center">
        <h1> Trek</h1>
        <h2>Explore Your Potential</h2>
      </div>

      <!-- LogIn and Sign Up buttons -->
      <div class="col-3" align="center">
					<!-- first modalBtn class is for login second is for sign up, check script below -->
          <button class="btn btn-secondary modalBtn">Login</button>
          <!-- Modal for login form -->
          <div class="modal myModal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <h1>Welcome to Trek</h1>
              <form action="/trek/src/backend/loginexec.php" method="post">
                <input type="text" name="username" value="Username"></input>
                </br>
                <input type="password" name="password" value="Password"></input>
                </br>
                <button type="submit" class="btn btn-secondary">Log In</button>
              </form>
            </div>
          </div>


          <button id="signupBtn" class="btn btn-secondary modalBtn">SignUp</button>
          <!-- Modal sign up form -->
          <div class="modal myModal">
            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">&times;</span>
              <h2>Welcome to Trek</h2>

              <form  id="regForm"method="post">
                <input type="text" name="fname" value="First Name"></input>
								<input type="text" name="lname" value="Last Name"></input>
                <br>
								<input type="text" name="uname" value="User Name"></input>
								<br>
                <input id="newPass" type="password" name="upass" value="Password"></input>
                <br>
                <input id="confirmPass" type="password" name="cupass" value="Password"></input>
                <br>
                <input id="emailField" type="email" name="uemail" value="newuser@email.com"></input>
                <br>
								<input type="text" name="uaddress" value="billing address"></input>
								<br>
              <button id="submitBtn" class="btn btn-primary">Submit</button>
            </div>
          </div>

      </div>
    </div>
  </div>




  <!-- ***********************NAVIGATION BAR******************************** -->

  <!-- Navigation Bar -->
  <div class="container navBarContainer">
    <div class="row justify-content-center navBarRow">
      <div class="col">
        <!-- Categories dropdown mwnu -->
        <div class="dropdown">
          <button type="button" class="btn btn-outline-light" id="categoriesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">&#9776; Categories</button>
          <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
            <a class="dropdown-item" href="#">Casual</a>
            <a class="dropdown-item" href="#">Electrical</a>
            <a class="dropdown-item" href="#">Racing</a>
            <a class="dropdown-item" href="#">Unicycle</a>
            <a class="dropdown-item" href="#">Special Design</a>
          </div>
        </div>
      </div>
      <div class="col">
        <button type="button" class="btn btn-outline-light">Electric</button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-outline-light">Unicycle</button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-outline-light">Racing</button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-outline-light">City Bike</button>
      </div>
      <div class="col">
        <button type="button" class="btn btn-outline-light">Mountain Bike</button>
      </div>
    </div>
  </div>




  <!-- ************************PANORAMIC SLIDESHOW************************** -->

  <!-- Carousel content -->
  <!-- Panoramic photos img 1020x455 -->
  <div class="container">
    <div id="panoramicSlideshow" class="carousel slide" data-ride="carousel">

      <!-- Indicators -->
      <ul class="carousel-indicators">
        <li data-target="#panoramicSlideshow" data-slide-to="0" class="active"></li>
        <li data-target="#panoramicSlideshow" data-slide-to="1"></li>
        <li data-target="#panoramicSlideshow" data-slide-to="2"></li>
      </ul>

      <!-- The slideshow -->
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/mbPanoramic.png" alt="mountain biking" width="1100" height="500">
        </div>
        <div class="carousel-item">
          <img src="images/unicyclePanoramic.png" alt="woman on unicycle" width="1100" height="500">
        </div>
        <div class="carousel-item">
          <img src="images/racingPanoramic.png" alt="racing bike" width="1100" height="500">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="carousel-control-prev" href="#panoramicSlideshow" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#panoramicSlideshow" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>




  <!-- **********************SUBCATEGORIES PRODUCTS************************* -->

  <!-- Main Content with Categories -->
  <!-- Individual item for sale img 270 x 175 -->
  <div class="d-flex flex-column">
    <!-- First Sub-Cattegory of items for sale -->
    <div class="scrollmenu align-self-center" id="casualBikesM">
      <div class="productDiv">
      <!-- Item for sale image and price button bellow -->
        <div class="d-flex flex-column p-2">
          <div>
            <img src="images/bikeSale1.png" alt="slide 1" />
          </div>
          <div class="align-self-center">
            <button class="button priceButton">€ 359</button>
          </div>
        </div>
      </div>
      <div class="productDiv">
      <!-- Item for sale image and price button bellow -->
        <div class="d-flex flex-column p-2">
          <div>
            <img src="images/bikeSale2.png" alt="slide 1" />
          </div>
          <div class="align-self-center">
            <button class="button priceButton">€ 479</button>
          </div>
        </div>
      </div>
      <div class="productDiv">
      <!-- Item for sale image and price button bellow -->
        <div class="d-flex flex-column p-2">
          <div>
            <img src="images/bikeSale3.png" alt="slide 1" />
          </div>
          <div class="align-self-center">
            <button class="button priceButton">€ 799</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Second Sub-Cattegory of items for sale -->
    <div class="scrollmenu align-self-center" id="racinglBikesMenu">
      <div class="productDiv">
      <!-- Item for sale image and price button bellow -->
        <div class="d-flex flex-column p-2">
          <div>
            <img src="images/bikeSale1.png" alt="slide 1" />
          </div>
          <div class="align-self-center">
            <button class="button priceButton">€ 359</button>
          </div>
        </div>
      </div>
      <div class="productDiv">
      <!-- Item for sale image and price button bellow -->
        <div class="d-flex flex-column p-2">
          <div>
            <img src="images/bikeSale2.png" alt="slide 1" />
          </div>
          <div class="align-self-center">
            <button class="button priceButton">€ 479</button>
          </div>
        </div>
      </div>
      <div class="productDiv">
      <!-- Item for sale image and price button bellow -->
        <div class="d-flex flex-column p-2">
          <div>
            <img src="images/bikeSale3.png" alt="slide 1" />
          </div>
          <div class="align-self-center">
            <button class="button priceButton">€ 799</button>
          </div>
        </div>
      </div>
    </div>




  <!-- *****************************FOOTER********************************** -->

  <!-- Footer -->
  <div class="containe-fluid">
  </div>




  <!-- *****************************SCRIPTS********************************* -->

  <!-- Script to open and close categories bar -->
  <script>

    function openSidepanel() {
      document.getElementById("categoriesSidepanel").style.width = "250px";
    }

    function closeSidepanel() {
      document.getElementById("categoriesSidepanel").style.width = "0px";
    }
  </script>

  <!-- Panoramic Sliding show/ Carousel -->
  <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
  </script>

  <!-- Signup modal and Login modal-->
  <script>
    // Get the modal
    var modalLogIn = document.getElementsByClassName('myModal')[0];
    var modalSignUp = document.getElementsByClassName('myModal')[1];
    // Get the button that opens the modal
    var btnLogIn = document.getElementsByClassName("modalBtn")[0];
    var btnSignUp = document.getElementsByClassName("modalBtn")[1];
    // Get the <span> element that closes the modal
    var spanLogIn = document.getElementsByClassName("close")[0];
    var spanSignUp = document.getElementsByClassName("close")[1];

    // When the user clicks on the button, open the modal
    btnLogIn.onclick = function() {
    modalLogIn.style.display = "block";
    }
    btnSignUp.onclick = function() {
    modalSignUp.style.display = "block";
		}

		//Check if the email is valid, then allow the submit button
		const emailField = document.getElementById("emailField");
		emailField.addEventListener('keyup', function(event){
			var isValidEmail = emailField.checkValidity();
				if (isValidEmail){
					document.getElementById("submitBtn").disabled = false;
				}else{
					document.getElementById("submitBtn").disabled = true;
				}
		})

		// When button is clicked submit the validated  registration form
		const regForm = document.getElementById("regForm");
		const submitBtn = document.getElementById("submitBtn");
		submitBtn.addEventListener('click', function(event){
			regForm.action("/trek/src/backend/signup.php");
			regForm.submit();
		})

    // When the user clicks on <span> (x), close the modal
    spanLogIn.onclick = function() {
    modalLogIn.style.display = "none";
    }
    spanSignUp.onclick = function() {
    modalSignUp.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
      modalLogIn.style.display = "none";
      modalSignUp.style.display = "none";
    }
    }

  </script>



</body>
</html>
