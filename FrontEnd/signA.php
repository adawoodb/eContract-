<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
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
					<li class="propClone"><a href="logout.php">Logout</a></li>
				<li class="propClone"><a href="reset-password.php">Rest Passowrd</a></li>
				<li class="propClone"><a href="contact.php">Contact</a></li>
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Sign Document
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>
<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems"> Document Signed</h1>
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
	<div class="col-lg-8 col-lg-offset-2">
	       <form method="POST" action="sent.php" id="contactform">
        <?php
		
		$url = 'http://8.213.26.195/output-file/';
		 function sign_file($path, $img, $field){
// add file 


$xx = file_get_contents($img);


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://8.213.26.195/api/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('action' => 'sign-file','path' => $path,'img' => $xx,'field' => $field),
    CURLOPT_HTTPHEADER => array(
    
	"Content-Type: multipart/form-data"
	
  ),
   
));

$response = curl_exec($curl);

curl_close($curl);

return $response;
}
		

		
		
		
		
		if(isset($_POST["submit"]) && !empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			
	
				 

$path = $_SESSION["company"].'.pdf';


			
			$response = sign_file($path, $_FILES["sign-img"]['tmp_name'], "Company");
			
			$req_status = (int)json_decode($response)->status;
			
if($req_status == 1){



		
		
		echo'<label>Document Signed</label>'.
       '<object style="margin-left:auto;margin-right:auto;text-align:center; width:-webkit-fill-available; height:700px;" data="'.$url.$_SESSION["company"].'-signed.pdf"></object>'.
       '<input type="submit" name="submit" id="submit" class="clearfix btn"  value="Send to Client">'.
	'</form>';
	
	
	}else{

}
			
			
			
		}else{
			
			   header("location: make-contract.php");
					exit;
			
			
		}
		
		
		?>
	
	
	
		</div>
	</div>
</div>

</section>
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

</body>
</html>