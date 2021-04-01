<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>NCRbricks</title>
    <!-- Font Awesome -->
	<!--<link rel="stylesheet" href="css/font-awesome.min.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet" />
	<link rel="shortcut icon" href="img/favicon.png" />

	<script type="text/javascript">
    	var x = confirm('Are you want to open admin panel?');
    	if (x) {
    		window.location = 'vro/index.php';
    	}else{

    	}
    </script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="index.php" target="_self">
                    <h1>NCRbricks.com</h1>
                </a>
			</div>
			<div class="col-md-6 number">
				<a href="tel:+91-xxx-xxx-xxxx"><span class="fa fa-mobile" style="font-size:24px;"></span> Call us: +91(xxx)xxx-xxxx</a>
			</div>
		</div>
		<div class="menu">
			<div class="row bg-primary menu-link">
				<div class="col-md-2 col-sm-4 menu-div">
					<button type="button" class="dropbtn bg-white text-primary"><b><a href="index.php" >HOME</a></b></button>
				</div>
				<div class="col-md-2 col-sm-4 menu-div">
					<button class="dropbtn"><b><a href="index.php#aboutus"  class="text-white">ABOUT US</a></b></button>
				</div>
				<div class="col-md-2 col-sm-4 menu-div">
					<button class="dropbtn"><b><a href="index.php#service"  class="text-white">SERVICES</a></b></button>
				</div>
				<div class="col-md-3 col-sm-6 menu-div">
					<button class="dropbtn"><b><a href="contact.php" class="text-white">CONTACT US</a></b></button>
				</div>
			</div>
		</div>
		<!-- Content -->
		<div class="slideshow">

			<div class="mySlides fade">
			  <div class="numbertext">1 / 5</div>
			  <img src="img/img_1.jpg" style="width:100%; height:100%;" />
			  <div class="text"><p>Take the experience of a cheap and fast maintenance service once.<br/>
			  Our mechanics accomplish every task in a very short time.<br/>We/Team work for reliability.</p></div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">2 / 5</div>
			  <img src="img/img_2.jpg" style="width:100%; height:100%;" />
			  <div class="text"><p>India On-Road is providing complete on road vehicle repair & friendly service in India.</p></div>
			</div>

			<div class="mySlides fade">
			  <div class="numbertext">3 / 5</div>
			  <img src="img/img_3.jpg" style="width:100%; height:100%;" />
			  <div class="text"><p>Our team is highly skilled and experienced.<br/> Technicians are delivering quality vehicle repair.</p></div>
			</div>
			
			<div class="mySlides fade">
			  <div class="numbertext">4 / 5</div>
			  <img src="img/img_4.jpg" style="width:100%; height:100%;" />
			  <div class="text"><p>If your vehicle need maintenance service anywhere in India, you can trust our team to help your vehicle on road.</p></div>
			</div>
			
			<div class="mySlides fade">
			  <div class="numbertext">5 / 5</div>
			  <img src="img/img_5.jpg" style="width:100%; height:100%;" />
			  <div class="text"><p>We are also providing logostics service in Indian location.</p></div>
			</div>

		</div>
		
		<br>

		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>

		<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
				var i;
				var slides = document.getElementsByClassName("mySlides");
				var dots = document.getElementsByClassName("dot");
				for (i = 0; i < slides.length; i++) {
				   slides[i].style.display = "none";  
				}
				slideIndex++;
				if (slideIndex > slides.length) {slideIndex = 1}    
				for (i = 0; i < dots.length; i++) {
					dots[i].className = dots[i].className.replace(" active", "");
				}
				slides[slideIndex-1].style.display = "block";  
				dots[slideIndex-1].className += " active";
				setTimeout(showSlides, 5000); // Change image every 2 seconds
			}
		</script>
		<!-- Content -->
		            <!--Section: Cards-->
           <section class="py-5" id="about">
      <div class="container">
        <h1 >About</h1>
        <p>(archaic) In circuit; circularly; by a circuitous way; around the outside; in circumference. [ First attested around 1350 to 1470. a mile about, and a third of a mile across. (chiefly Canada, US, colloquial) Going to; on the verge of; intending to.</p>
      </div>
    </section>
	
	<section class="py-5" id="service">
      <div class="container">
        <h1 >Services</h1>
        <p>(archaic) In circuit; circularly; by a circuitous way; around the outside; in circumference. [ First attested around 1350 to 1470. a mile about, and a third of a mile across. (chiefly Canada, US, colloquial) Going to; on the verge of; intending to.</p>
      </div>
    </section>

			
			 <section class="text-center">

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">

                    <!--Grid column-->
                    <div class="col-lg-12 col-md-12 mb-12">

                        <!--Card-->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body">
								<h3 class="card-title text-primary"><b>OUR SERVICES</b></h3><hr/><hr/>
                                <div class="row mb-4 wow fadeIn">

									<!--Grid column-->
									<div class="col-lg-4 col-md-6 mb-3">

											<!--Card content-->
											<div class="card-body">
												<img src="img/home_img_1.jpg" >
												<p class="card-title text-primary">Truck Service</p>
												<button class="bg-primary readbtn" ><a class="text-white" href="services.html#truck_service">Read More</a></button>
											</div>
									</div>
									<!--Grid column-->
									<div class="col-lg-4 col-md-6 mb-3">

											<!--Card content-->
											<div class="card-body">
												<img src="img/home_img_2.jpg" >
												<p class="card-title text-primary">Truck Repair</p>
												<button class="bg-primary readbtn" ><a class="text-white" href="services.html#truck_repair">Read More</a></button>
											</div>
									</div>
									<!--Grid column-->
									<div class="col-lg-4 col-md-6 mb-3">

											<!--Card content-->
											<div class="card-body">
												<img src="img/home_img_3.jpg" >
												<p class="card-title text-primary">Logistic Services</p>
												<button class="bg-primary readbtn" ><a class="text-white" href="services.html#logistics">Read More</a></button>
											</div>
									</div>
								</div>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->
                   
				</div>
            </section>
            <!--Section: Cards-->
			
			<section class="card fadeIn" >
				<div class="row">
                    <div class="col-md-3 col-sm-6 card-body text-center">
                        <div class="why_us_item">
                            <span class="fa fa-thumbs-up" style="font-size:48px;"></span>
                            <h5>We deliver quality</h5>
                            <p>Quality products & services offered </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 card-body text-center">
                        <div class="why_us_item">
                            <span class="fa fa-clock-o" style="font-size:48px;"></span>
                            <h5>Constant improvement</h5>
                            <p>Improvement is our first priority.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 card-body text-center">
                        <div class="why_us_item">
                            <span class="fa fa-meh-o" style="font-size:48px;"></span>
                            <h5>We are pasionate</h5>
                            <p>Prompt pre and post sales support, Qualified Specialist</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 card-body text-center">
                        <div class="why_us_item">
                            <span class="fa fa-line-chart" style="font-size:48px;"></span>
                            <h5>Transparent,Responsive Services</h5>
                            <p>Professional team & well coordinated working</p>
                        </div>
                    </div>
                </div>
			</section>
			<section class="card wow fadeIn" style="background-color:rgb(232,232,232);">
				<div class="card-body text-primary text-center">
					<h3 class="mb-4">
						<strong>Questions, give us a call</strong>
					</h3>
					<h5>
						<a id="topleft" style="height:25px; vertical-align:middle;" href="tel:+91-xxx-xxx-xxxx"><strong>Call us: +91(xxx)xxx-xxxx</strong></a>
					</h5>
				</div>
			</section>
	
	<!--Footer-->
   <footer class="py-2 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright © 2018-<?php echo date("Y");?> NCRbricks.com All Rights Reserved.</p>
      </div>
      <!-- /.container -->
    </footer>
    <!--/.Footer-->

</div>	
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>


</body>

</html>