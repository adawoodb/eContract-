<?php

// This is the API to possibility show the user list, and show a specific user by action.

  header('Access-Control-Allow-Origin: *');
  header('Content-Type: multipart/form-data');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');




	      function generateRandomString($length = 10) {


$random_name = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
 
$random_name = "$random_name"; 
return $random_name;  

 }


function sign_file($arg1 , $arg2, $arg3)
{

	//$f = "../htemp/".generateRandomString(24);
	//file_put_contents($f[$i],$file[$i]);
	$pp = "../output-file/".$arg1;
	

$jar ="java -jar ../PDFSigner/PDFSigner.jar  $pp $arg2 $arg3 ../PDFSigner/Fat_Client3.pfx 2>&1";

$msg1 = shell_exec( $jar);
//$rm = shell_exec("rm ".$path."*.pdf 2>&1");
	
			$user_list = array("status" => 1, "massage" => $msg1);  // call in db, here I make a list of 3 users.
	  return $user_list;
}






function make_file($arg1 , $arg2, $arg3)
{

	//$f = "../htemp/".generateRandomString(24);
	//file_put_contents($f[$i],$file[$i]);
	
	

$jar ="java -jar ../makePDF/dist/PDF-Forms.jar  $arg1 $arg2 $arg3 2>&1";

$msg1 = shell_exec( $jar);
//$rm = shell_exec("rm ".$path."*.pdf 2>&1");
	
			$user_list = array("status" => 1, "massage" => $msg1);  // call in db, here I make a list of 3 users.
	  return $user_list;
}


$value = array("status" => 0, "massage" => "erorr request");



if ($_POST["action"] == "make-file" )

{
	
	$f = "../htemp/".generateRandomString(24).".html";
	move_uploaded_file($_FILES["content"]['tmp_name'],$f);
	 
	$value = make_file($f , $_POST["company"],$_POST["client"] );
	
	
	
}else if ($_POST["action"] == "sign-file" )

{
	
	$f = "../img/".generateRandomString(24).".png";
	
	file_put_contents($f,$_POST["img"]);
	 
	$value = sign_file( $_POST["path"],$f , $_POST["field"] );
	
	
	
}




exit(json_encode($value));

?>
