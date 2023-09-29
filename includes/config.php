<?php

$host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_db = 'cotton_ml';

$conn = mysqli_connect($host, $mysql_username, $mysql_password, $mysql_db)or die('Error');

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}



$title="Arockia Ilai";
$description="Arockia Ilai";
$author="Arockia Ilai";
$fav_icon="img/fav.png";

?>