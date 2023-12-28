<?php ob_start(); ?>
<?php
//Ket noi den database phpMyadmin
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "web";
$connection = mysqli_connect('localhost','root','','web','3305');
//if ($connection) {  
 //   echo "we are connected";
//} 



?>