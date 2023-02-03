<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
</head>
<body>


<!-- HEADER =============================-->
<header class="item header margin-top-0">
<div class="wrapper">
	<nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle navigation</span>
			</button>
			<a href="index.php" class="navbar-brand brand"> eContract </a>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="index.php">Home</a></li>
				<?php if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){?>
				<li class="propClone"><a href="login.php">Login</a></li>
				<li class="propClone"><a href="register.php">Signup</a></li>
			<?php	}else{?>
				<li class="propClone"><a href="logout.php">Logout</a></li>
				<li class="propClone"><a href="reset-password.php">Rest Passowrd</a></li>
			<?php	}?>
				<li class="propClone"><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-homeimage">
					<div class="maintext-image" data-scrollreveal="enter top over 1.5s after 0.1s">
						 Make Your Contract Easy
					</div>
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.3s">
						 With eContract Platform
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>


<!-- STEPS =============================-->
<div class="item content">
	<div class="container toparea">
		<div class="row text-center">
			<div class="col-md-4">
				<div class="col editContent">
					<span class="numberstep"><i class="fa fa-pencil-square-o "></i></span>
					<h3 class="numbertext">Sign Contract Easily</h3>
					<p>
					from anywhere and at any time, you can sign your contracts digitally 
					</p>
				</div>
				<!-- /.col-md-4 -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-university  "></i></span>
					<h3 class="numbertext">Comply with Saudi Law  </h3>
					<p>
					Our solution makes your contract Legally authoritative by using the digital signature, which relies on the electronic transaction law and the evidence law.   
					</p>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-gavel"></i></span>
					<h3 class="numbertext">Legally Approved Contract Forms  </h3>
					<p>
					Audited contract forms from legal offices for all the work you need 
					</p>
				</div>
			</div>
			<div class="col-md-4 editContent">
				<div class="col">
					<span class="numberstep"><i class="fa fa-lock"></i></span>
					<h3 class="numbertext">Ensure the Integrity of Digital Contracts  </h3>
					<p>
					The contracts are signed (digitally), ensuring that the contract data will not be changed or modified, as the digitally signed contracts are accepted in the Kingdom of Saudi Arabia courts. 
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
	
	
	<!-- LATEST ITEMS =============================-->
<section class="item content">
	<div class="container">
		<div class="underlined-title">
			<div class="editContent">
				<h1 class="text-center latestitems">LATEST ITEMS</h1>
			</div>
			<div class="wow-hr type_short">
				<span class="wow-hr-h">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				</span>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>Individual package</h3>
							<p>
								 Designed for individuals who practice their free and independent business. 3 signature requests / 18 riyals per month.
							</p>
							<p>
								<a href="payment.php" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Get-Started</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/econtract.png" alt=""></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1>Individual package</h1>
						</a>
						<span class="price">
						<span class="edd_price">SAR 18.00</span>
						</span>
					</div>
				</div>
			</div>
			<!-- /.productbox -->
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>Facilities package</h3>
							<p>
								 The facilities package is designed for companies to prepare, send, sign and manage agreements. 5 riyals per signature.
							</p>
							<p>
								<a href="payment.php" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Get-Started</a>
							</p>
						</div>
						<span class="maxproduct"><img src="images/econtract.png" alt=""></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1>Facilities package</h1>
						</a>
						<span class="price">
						<span class="edd_price">SAR 5.00</span>
						</span>
					</div>
				</div>
			</div>
			<!-- /.productbox -->
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3>Organization package</h3>
							<p>
								 The organization package is designed for large organizations that need a complete digital signature solution with their own templates and workflows. contact with us.
							</p>
							<p>
								<a href="contact.php" class="learn-more detailslearn"><i class="fa fa-comments"></i> Contact Us</a>
							</p>
							
						</div>
						<span class="maxproduct"><img src="images/econtract.png" alt=""></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1>Organization package</h1>
						</a>
						<span class="price">
						<span class="edd_price"><a href="contact.php"> Contact Us </a></span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>


<!-- BUTTON =============================-->

<br/>


<!-- AREA =============================-->
<div class="item content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<i class="fa fa-microphone infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">General Questions</h1>
					<p>
						 Not sure if it's got all the features you need? Trouble completing the payment? Or just want to say hi? Send us your message and we will answer as soon as possible!
					</p>
					<p class="text-center">
						<a href="contact.php">- Get in Touch -</a>
					</p>
				</div>
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4">
				<i class="fa fa-comments infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle"> Support</h1>
					<p>
						  support to help you if you need</p>
					<p class="text-center">
						<a href="contact.php">- Get in Touch -</a>
					</p>
				</div>
			</div>
			<!-- /.col-md-4 col -->
			<div class="col-md-4">
				<i class="fa fa-bullhorn infoareaicon"></i>
				<div class="infoareawrap">
					<h1 class="text-center subtitle">Hire Us</h1>
					<p>
						 If you can't find an answer to your question, please don't hesitate to reach out to us.
					</p>
					<p class="text-center">
						<a href="contact.php">- Get in Touch -</a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- TESTIMONIAL =============================-->



<!-- CALL TO ACTION =============================-->



<!-- FOOTER =============================-->
<div class="footer text-center">
	<div class="container">
		<div class="row">
			<p class="footernote">
				 Connect with eContract
			</p>
			<ul class="social-iconsfooter">
				<li><a href="#"><i class="fa fa-phone"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<p>
				 &copy; 2023 eContract<br/>
				
			</p>
		</div>
	</div>
</div>

<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script>
//----HOVER CAPTION---//	  
jQuery(document).ready(function ($) {
	$('.fadeshop').hover(
		function(){
			$(this).find('.captionshop').fadeIn(150);
		},
		function(){
			$(this).find('.captionshop').fadeOut(150);
		}
	);
});
</script>
	
</body>
</html>