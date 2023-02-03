<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


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
				<li class="propClone"><a href="login.php">Login</a></li>
				<li class="propClone"><a href="register.php">Signup</a></li>
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

        <?php
		
		$url = 'http://8.213.26.195/output-file/';
		$company_name = $_GET['COMPANY'];
		$company_email = $_GET['E-COMPANY'];
		$client_email= $_GET['E-CLIENT'];	


Function send_mail($recipients, $body){
	

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
foreach($recipients as $email => $name)
{
$mail->AddCC($email, $name);
}
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

function submit_request($company,$link, $tamp, $company_email ,$client_email ){
	
$body = file_get_contents($tamp);

$body = str_replace("@COMPANY@" , $company , $body);
$body = str_replace("@LINK@" , $link , $body);

$recipients = array(
   $client_email => $client_email,
   $company_email =>  $company_email,
   // ..
);


$s1 = send_mail($recipients, $body);

return $s1;	
}
		
		
		
		

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
			
	echo '			<h1 class="text-center latestitems"> Document Signed</h1>
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
	       <form method="POST" action="" id="contactform" enctype="multipart/form-data">';
				 

$path = $company_name.'-signed.pdf';


			
			$response = sign_file($path, $_FILES["sign-img"]['tmp_name'], "Client");
			
			$req_status = (int)json_decode($response)->status;
			
if($req_status == 1){



		
		
		echo '<object style="margin-left:auto;margin-right:auto;text-align:center; width:-webkit-fill-available; height:700px;" data="'.$url.$company_name.'-signed-signed.pdf"></object>'.
	'</form>';
	
	$link = 'http://'.$_SERVER['HTTP_HOST'].'/document.php?COMPANY='.$company_name.'&E-COMPANY='.$company_email.'&E-CLIENT='.$client_email;

submit_request($company_name,$link, "tamp1.html",  $company_email ,$client_email);
	}else{

}
			
			
			
		}else{
			echo '			<h1 class="text-center latestitems">Upload Signature Image </h1>
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
	       <form method="POST" action="" id="contactform" enctype="multipart/form-data">';
			
			
			
			  echo'<input type="file" name="sign-img" id="sign-img">'.
       '<object style="margin-left:auto;margin-right:auto;text-align:center; width:-webkit-fill-available; height:700px;" data="'.$url.$company_name.'-signed.pdf"></object>'.
       '<input type="submit" name="submit" id="submit" class="clearfix btn" value="Sign">'.
	'</form>';
			
			
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