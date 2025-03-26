<?php

$servername="localhost";
$dbuser="root";
$dbpassword="";
$dbname="chocolate";

$connect = mysqli_connect($servername,$dbuser,$dbpassword,$dbname);

if($connect)
{
 // echo("Connect successfully!");
}

?>
