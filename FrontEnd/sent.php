<?php
// Initialize the session
session_start();


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

Function send_mail($email, $body){
	

$mail =  new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();

$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->SMTPSecure = true;
$mail->SMTPAutoTLS = true;
$mail->Host     = "smtp.gmail.com";
$mail->Port     = 587;  
$mail->Username = "econtract.care@gmail.com";
$mail->Password = "fvpiyucgreebcvxx";
$mail->CharSet   = "UTF-8";

$mail->SetFrom("econtract.care@gmail.com", "econtract.care@gmail.com");

$mail->AddAddress($email);

$mail->Subject = "eContract Notification";

$mail->IsHTML(true);

$content = $body;
$mail->MsgHTML($content);
if(!$mail->Send()) {
	

$status = 1;
}else{

$status = 0;
}	
	
	
return $status;	
}

function submit_request($company,$link, $tamp){
	
$body = file_get_contents($tamp);

$body = str_replace("@COMPANY@" , $company , $body);
$body = str_replace("@LINK@" , $link , $body);

$s1 = send_mail($_SESSION["client-email"], $body);

return $s1;	
}
$link = 'http://'.$_SERVER['HTTP_HOST'].'/signB.php?COMPANY='.$_SESSION["company"].'&E-COMPANY='.$_SESSION["email"].'&E-CLIENT='.$_SESSION["client-email"];
echo $link;
submit_request($_SESSION["company"],$link, "tamp.html");




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
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 
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
			<h1 class="text-center latestitems">The file sent to client email successfully</h1>
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
			
			  
		</div>
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