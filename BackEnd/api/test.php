<?php

$jar ="java -jar ..\makePDF\dist\PDF-Forms.jar  aaa bbb ccc 2>&1";
$msg1 = "test";
$comand ="aa bb cc";
$msg1 = shell_exec( $jar);
echo $msg1."........".$comand;

?>