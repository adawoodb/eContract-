<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'rm-l4vg45o31z3w9gz4i.mysql.me-central-1.rds.aliyuncs.com');
define('DB_USERNAME', 'contract');
define('DB_PASSWORD', 'Contract@123');
define('DB_NAME', 'mywebDB');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>