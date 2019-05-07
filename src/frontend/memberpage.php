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
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- My CSS -->
	  <link rel="stylesheet" href="/trek/src/frontend/css/style.css" type="text/css">


    <title>Trek Member's Page</title>
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
        <a href="/trek/src/frontend/memberpage.php"><img src="/trek/images/logoSmall115.png" alt="treck logo"></a>
				<p style="color:white">Welcome <?php echo $_SESSION['UNAME'] ?> </p>
      </div>

      <!-- Title -->
      <div class="col-6  titleCell" align="center">
        <h1> Trek</h1>
        <h2>Explore Your Potential</h2>
      </div>

      <!-- LogIn and Sign Up buttons -->
      <div class="col-3" align="center">
					<!-- first modalBtn class is for adding new item for sale, check script below -->
          <button id="newProductBtn" type="button" class="btn btn-secondary modalBtn" onclick="newProductForm()" >Sell Item</button>

					<!-- button to view account details for the currently loged in user-->
          <button class="btn btn-secondary modalBtn">Account</button>

					<!-- to logout and desplay the home page -->
					<button class="btn btn-secondary modalBtn" onclick="window.location.href='/trek/src/backend/logout.php';" type="button">Log Out</button>
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
            <img src="/trek/images/mbPanoramic.png" alt="mountain biking" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="/trek/images/unicyclePanoramic.png" alt="woman on unicycle" width="1100" height="500">
          </div>
          <div class="carousel-item">
            <img src="/trek/images/racingPanoramic.png" alt="racing bike" width="1100" height="500">
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


		<!-- ************************ Add new Product for sale form ************** -->

		<div class="container ">
				<form id="newProductForm">
					<label for="categories" >Select Category</label>
						<select name="categories">
							<option value="city bike">City Bike</option>
							<option value="electric">Electric Bikes</option>
							<option value="racing">Racing</option>
							<option value="unicycle">Unicycle</option>
							<option value="mountain bike">Mountain Bike</option>
						</select>
						<p>upload photo </p>
						<input type="file" id="#photofile" name="photofile" multiple></input>
						<br>
						<textarea name="itemDescription" rows="3" cols="30">Item for sale description....</textarea>
						<br>
					 	<lable for="itemprice" >Selling price</label>
						<input type="text field" name="itemprice">100 </input><p>&euro</p>
						<input type="submit" class="btn btn-primary" value="Submit Item">
				</form>
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
              <img src="/trek/images/bikeSale1.png" alt="slide 1" />
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
              <img src="/trek/images/bikeSale2.png" alt="slide 1" />
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
              <img src="/trek/images/bikeSale3.png" alt="slide 1" />
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
              <img src="/trek/images/bikeSale1.png" alt="slide 1" />
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
              <img src="/trek/images/bikeSale2.png" alt="slide 1" />
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
              <img src="/trek/images/bikeSale3.png" alt="slide 1" />
            </div>
            <div class="align-self-center">
              <button class="button priceButton">€ 799</button>
            </div>
          </div>
        </div>
      </div>
		</div>


      <!-- *****************************FOOTER********************************** -->

      <!-- Footer -->
      <div class="containe-fluid">
      </div>



      <!-- *****************************SCRIPTS********************************* -->

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

      <!-- Add new Product for sale form-->
      <script type="text/javascript">
			$(document).ready(
			function (){
				$("#newProductForm").hide();
			})
			//When add new product button is clicked
			function newProductForm(){
				$("#newProductForm").show();
				$("#panoramicSlideshow").hide();
				$("#newProductForm").on('submit', function(){
					var photo_data = $('#photofile').prop('files')[0];
					window.alert("Text file");
					//$("#newProductForm").hide();
					//$("#panoramicSlideshow").show();
				})
			}

			//After new product form is submitted

      </script>




    </body>
    </html>
