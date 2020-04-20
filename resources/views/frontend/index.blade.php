<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Stayhome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet"> -->

    <link rel="stylesheet" href="{{ URL::asset('assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
	   
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/ionicons.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style1.css') }}">
    
  </head>


  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<!-- 	phonnumber,email ,sign up, sign in bar   -->
	<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 393455673509</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">riccardo@gruppocapitanio.it</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><a href="#" class="mr-3">Sign Up</a><a href="#">Sign In</a></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
   
	<nav class="navbar navbar navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
		  <a class="navbar-brand" href="{{ route('home') }}">My Logo</a>
		  <!-- search input -->
		  <form action="#" class="search-location">
			<div class="row">
				<div class="col-lg align-items-end">
					<div class="form-group">
					  <div class="form-field">
					<input type="text" class="form-control" placeholder="Search...">
					<button><span class="ion-ios-search"></span></button>
				  </div>
			  </div>
				</div>
			</div>
		</form>
		<!-- menu button bar -->
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="#services-section" class="nav-link"><span>Read more</span></a></li>
	          <li class="nav-item"><a href="#properties-section" class="nav-link"><span>Listing</span></a></li>
	          <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="#workflow-section" class="nav-link"><span>How it works</span></a></li>
	          <li class="nav-item"><a href="#agent-section" class="nav-link"><span>Agent</span></a></li>
	          <li class="nav-item"><a href="#blog-section" class="nav-link"><span>Blog</span></a></li>
	          <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
	  
	  <section class="hero-wrap js-fullheight" style="background-image: url({{ asset('assets/images/bg_2.jpg')}});" data-section="home" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-5 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">STAY HOME SALE</h1>
            <p class="mb-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Comfortable & stylish - now with 100€* off on your next personalised clothing selection!</p>
			
			<div class="container-cc">
				<button type="button" id="selGo" class="btn btn-outline-primary">GET SALE BOX NOW</button>
			  </div>
          </div>
        </div>
      </div>
    </section>
	
		
		<section class="ftco-section ftco-services-2 bg-light" id="services-section">
			<div class="container">
				<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">READ MORE</h2>
			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			<P>We are here for you
				To our OUTFITTERY community,
				First and foremost, I hope that you and your loved ones are well. That you stay healthy and take care of each other.
				The health and safety of our team, customers and community is of highest priority to us.
			</P>
          </div>
		</div>
		

        <div class="row">
        	<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-pin"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Measures we are taking:</h3>
                <p>	We are constantly monitoring and following the recommended advice from the World Health Organisation and additional trusted sources, such as the Robert Koch institute.
					Implementing internal safety guidelines and information streams to responsibly and collectively #flattenthecurve
					Our employees in home office since March 16th
					The logistics employees working in shifts and sections to allow for social distancing
					 There are now higher hygiene standards to keep clothes & packages safe
					We have additional customer support
					NEW: Free return pick up service (Germany)				
					Please see the answers to the most frequently questions we have received below.
					Can I still order with you?
					Yes, as of now everything is still working as usual and you can still order a box with a personal selection together with your stylist. We want to reassure you that we are taking all necessary steps to follow the World Health Organisation and local authorities guidelines such as the Robert Koch Institut, to keep offering a safe service for all our customers. 
				</p>
              </div>
            </div>      
		  </div>
		  


          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-detective"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">What will change for me if I am affected by a lockdown?</h3>
                <p>
					
		            
					As long as our delivery partners still provide their service and pickup points in your area are still open, you will of course still be able to order and get your box delivered and returned. All OUTFITTERY deliveries are currently being shipped as usual and we will continue to do our best to serve our customers with the highest delivery standards possible throughout this period. 
					Please follow the updates here on your local delivery services as lockdowns might affect specific pick up or access points:
					Germany: DHL and Hermes</br>
					Austria: Sevensenders </br>
					Switzerland: Swiss Post</br> 
					France: UPS </br>
					Luxembourg: UPS </br>
					Belgium: UPS </br>
					Netherlands: UPS  </br>
					Sweden: Postnord </br>
					Denmark: Postnord</p>
              </div>
            </div>      
		  </div>
		  


          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-house"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Due to the lockdown I cannot return my box. What should I do?</h3>
                <p>If you have your box at home, or if it has been delivered to a pickup point; don't worry about the return period but please contact our customer service and we will find a solution for you. 
					If your pickup point is closed please find the specific information for your country and area here: 
					Germany: DHL and Hermes
					Austria: Sevensenders  
					Switzerland: Swiss Post  
					France: UPS  
					Luxembourg: UPS  
					Belgium: UPS  
					Netherlands: UPS   
					Sweden: Postnord  
					Denmark: Postnord
					What is the current delivery time period?
					Germany: 2-3 days
					Benelux: 3-4 days
					Austria: 2-4 days
					France: 2-5 days
					Sweden; Denmark: 3-5 days
					Switzerland: 3-6 days
					</p>
              </div>
            </div>      
		  </div>
		  


          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block mt-lg-5 pt-lg-4">
              <div class="icon justify-content-center align-items-center d-flex"><span class="flaticon-purse"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">What safety and hygiene precautions are taken when my box is being delivered?</h3>
                <p>Our delivery partners are taking extra measures, such as social distancing and higher hygiene standards when delivering your package in order limit the possibility of transmission.
					Please find the latest and specific information for your local delivery service here:
					Germany: DHL and Hermes
					Austria: Sevensenders
					Switzerland: Swiss Post
					France: UPS
					Luxembourg: UPS
					Belgium: UPS
					Netherlands: UPS 
					Sweden: Postnord
					Denmark: Postnord
					Can I cancel my order?
					If your box hasn't been packed yet, it can still be canceled. If your box has already been packed or handed over to the delivery partner, we can try to stop it from being delivered. There is a chance that this is not possible; in the case you can still reject the delivery and it will be returned to us without risk for you. For cancellation requests always reach out to our customer service by calling 
					<br>+49 (30) 255 585 260
					</p>
              </div>
            </div>      
          </div>
		</div>
		<div class="col-md-12 heading-section text-center ftco-animate">
			<h3 class="heading mb-3">Can I delay my order?</h3>
			<p>
				
				Yes of course, by reaching out to your stylist you can postpone your box at any time to any date you wish. If you are an autopilot customer you can delay your order yourself by logging into your customer account to set a new date for your next box.
				<br><h5>How do I know that the clothes I receive are not infected?</h5>
				We are constantly monitoring and following the advice of the authorities and medical institutions. (Robert Koch Institute, World Health Organisation). Our warehouse is placing the highest importance on ensuring that your order is handled with extra safety and keeping our employees healthy and safe.
				I am worried that my economical situation might be affected and that I won't be able to afford my box, what can I do? 
				When you are ordering a personalised selection with us, you only pay for the clothes that you decide to keep. There are also no additional service, delivery or return costs. We understand that these are tough times and if you need more flexibility with your payment you can always reach out to our customer service and we will look into your specific case.</br>
			</p>
			<p>
				<h6>Our customer service team is available to answer any questions you might have, so don’t hesitate to reach out.</h6></p>
			<div>
				<div class="col-md-12 heading-section text-center ftco-animate">
					<h3 class="heading mb-3">Can I delay my order?</h3>
					
					<p>
						<h6>Our customer service team is available to answer any questions you might have, so don’t hesitate to reach out.</h6></p>
						<p>
							<div class="img">
								<img src="{{ asset('assets/images/vis.jpg') }}" class="img-fluid" alt="Colorlib Template">
								<div>
									<!-- <h3>I'm an agent</h3> -->
								</div>
							</div>	
							
						</p>
					
				<div>
	</div>
			
		</section>

		<section class="ftco-section ftco-properties" id="properties-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Property</h2>
          </div>
        </div>
    		<div class="row">
        	<div class="col-md-12">
            <div class="carousel-properties owl-carousel">
            	<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src=" {{ asset('assets/images/images (8).jpg')}}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-primary d-flex text-center align-items-center justify-content-center">
				    					<span>Sale</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$120,000</h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/istockphoto-614993726-612x612.jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$120<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (15).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-primary d-flex text-center align-items-center justify-content-center">
				    					<span>Sale</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$230,000</h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (25).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-primary d-flex text-center align-items-center justify-content-center">
				    					<span>Sale</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$120,000</h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (23).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/shirts-dry-cleaned-in-chicago.jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (18).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (19).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (12).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images.jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (6).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (2).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/images (5).jpg') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
				</div>
				<div class="item">
            		<div class="properties ftco-animate">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/zippay-store.png') }}" class="img-fluid" alt="Colorlib Template">
			    				</div>
			    				<div class="desc">
			    					<div class="text bg-secondary d-flex text-center align-items-center justify-content-center">
				    					<span>Rent</span>
				    				</div>
			    					<div class="d-flex pt-5">
				    					<div>
					    					<h3><a href="properties.html">Fatima Subdivision</a></h3>
											</div>
											<div class="pl-md-4">
												<h4 class="price">$50<span>/mo</span></h4>
											</div>
										</div>
										<p class="h-info"><span class="location">New York</span> <span class="details">&mdash; 3bds, 2bath</span></p>
			    				</div>
		    				</div>
            	</div>
            </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-services-2 bg-light" id="workflow-section">
			<div class="container">
				<div class="row">
          <div class="col-md-4 heading-section ftco-animate">
			<h2 class="mb-4">How it works</h2>
			
			<p><h3> accompany you on your personal style journey.</h3></p>

            <div class="media block-6 services text-center d-block pt-md-5 mt-md-5">
              <div class="icon justify-content-center align-items-center d-flex"><span><img src="{{ asset('assets/images/sd1.jpg') }}"></span></div>
              <div class="media-body p-md-3">
                <h3 class="heading mb-3">Tell us, which styles you like and which items you need.</h3>
                <p class="mb-5">Your box is tailored to fit your taste, size and budget.</p>
                <hr>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate mt-lg-5">
            <div class="media block-6 services text-center d-block mt-lg-5 pt-md-5 pt-lg-4">
              <div class="icon justify-content-center align-items-center d-flex"><span><img src="{{ asset('assets/images/sd2.jpg') }}"></span></div>
              <div class="media-body p-md-3">
                <h3 class="heading mb-3">Your stylist will send you your personally selected clothes.</h3>
                <p class="mb-5">Your stylist handpicks items so that you look and feel at your best.</p>
                <hr>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services text-center d-block">
              <div class="icon justify-content-center align-items-center d-flex"><span><img src="{{ asset('assets/images/sd3.jpg') }}"></span></div>
              <div class="media-body p-md-3">
                <h3 class="heading mb-3">Only pay for the items you keep.</h3>
                <p class="mb-5">You only pay what you keep. Shipping and returns are on us.</p>
                <hr>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-intro img" id="hotel-section" style="background-image: url({{ asset('assets/images/bg_4.jpg')}});">
			<div class="overlay"></div>
			<div class="container">
				<div class="row justify-content-end">
					<div class="col-md-7">
						<h2 class="mb-4">Choose Your Clothes for Only <span>$120,000</span></h2>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						<p class="mb-0"><a href="#" class="btn btn-white px-4 py-3">Advance Search</a></p>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-agent" id="agent-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Our Agents</h2>
          </div>
        </div>
    		<div class="row">
        	<div class="col-md-12">
            <div class="carousel-agent owl-carousel">
            	<div class="item">
            		<div class="agent">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/team-1.jpg') }}" class="img-fluid" alt="Colorlib Template">
				    				<div>
				    					<h3>I'm an agent</h3>
				    				</div>
			    				</div>
			    				<div class="desc pt-3">
			    					<div>
				    					<h3><a href="properties.html">James Stallon</a></h3>
											<p class="h-info"><span class="location">Listing</span> <span class="details">&mdash; 10 Properties</span></p>
										</div>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="agent">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/team-2.jpg') }}" class="img-fluid" alt="Colorlib Template">
				    				<div>
				    					<h3>I'm an agent</h3>
				    				</div>
			    				</div>
			    				<div class="desc pt-3">
			    					<div>
				    					<h3><a href="properties.html">James Stallon</a></h3>
											<p class="h-info"><span class="location">Listing</span> <span class="details">&mdash; 10 Properties</span></p>
										</div>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="agent">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/team-3.jpg') }}" class="img-fluid" alt="Colorlib Template">
				    				<div>
				    					<h3>I'm an agent</h3>
				    				</div>
			    				</div>
			    				<div class="desc pt-3">
			    					<div>
				    					<h3><a href="properties.html">James Stallon</a></h3>
											<p class="h-info"><span class="location">Listing</span> <span class="details">&mdash; 10 Properties</span></p>
										</div>
			    				</div>
		    				</div>
            	</div>
            	<div class="item">
            		<div class="agent">
		    					<div class="img">
				    				<img src="{{ asset('assets/images/team-4.jpg') }}" class="img-fluid" alt="Colorlib Template">
				    				<div>
				    					<h3>I'm an agent</h3>
				    				</div>
			    				</div>
			    				<div class="desc pt-3">
			    					<div>
				    					<h3><a href="properties.html">James Stallon</a></h3>
											<p class="h-info"><span class="position">Listing</span> <span class="details">&mdash; 10 Properties</span></p>
										</div>
			    				</div>
		    				</div>
            	</div>
            </div>
          </div>
        </div>
    	</div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">Read testimonials</span>
            <h2 class="mb-4">What Client Says</h2>
          </div>
        </div>
        <div class="row ftco-animate justify-content-center">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url({{ asset('assets/images/person_1.jpg') }} )">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Artist</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url({{ asset('assets/images/person_2.jpg') }})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Artist</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url({{ asset('assets/images/person_3.jpg') }})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Artist</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url({{ asset('assets/images/person_1.jpg') }})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Artist</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img" style="background-image: url({{ asset('assets/images/person_3.jpg') }})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text px-4 pb-5">
                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <p class="name">Jeff Freshman</p>
                    <span class="position">Artist</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Contact</span>
            <h2 class="mb-4">Contact Me</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>

        <div class="row block-9">
          <div class="col-md-7 order-md-last d-flex ftco-animate">
            <form action="#" class="bg-light p-4 p-md-5 contact-form">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

          <div class="col-md-5 d-flex">
          	<div class="row d-flex contact-info mb-5">
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-map-signs"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Address</h3>
				            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-phone2"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Contact Number</h3>
				            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-paper-plane"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Email Address</h3>
				            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
			            </div>
			          </div>
		          </div>
		          <div class="col-md-12 ftco-animate">
		          	<div class="box p-2 px-3 bg-light d-flex">
		          		<div class="icon mr-3">
		          			<span class="icon-globe"></span>
		          		</div>
		          		<div>
			          		<h3 class="mb-3">Website</h3>
				            <p><a href="#">yoursite.com</a></p>
			            </div>
			          </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>
		
		<!-- <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div id="map" class="bg-white"></div>
		</section> -->

    <footer class="ftco-footer ftco-section">
      <div class="container-fluid px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Stayhome</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Community</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Search Properties</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>For Agents</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Reviews</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>FAQs</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Our Story</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Meet the team</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Company</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About Us</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Press</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Careers</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/aos.js') }}"></script>
  <script src="{{ URL::asset('assets/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/scrollax.min.js') }}"></script>
  <!-- <script src="{{ URL::asset('assets/js/google-map.js') }}"></script> -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
  
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>
	
	<script>
		$("#selGo").click(function(){
			window.location = "{{ route('styleprof.index') }}";
		});
	</script>
  </body>
</html>