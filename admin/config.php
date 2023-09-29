<?php
session_start();
$host = 'localhost';
$mysql_username = 'root';
$mysql_password = '';
$mysql_db = 'cotton_ml';

$con = mysqli_connect($host, $mysql_username, $mysql_password, $mysql_db)or die('Error');
// $q = $conn->query("set character_set_results='utf8'");
// $qr1 = $conn->query("SET names=utf8");
// $qr2 = $conn->query("SET character_set_client=utf8");
// $qr3 = $conn->query("set character_set_results='utf8'");
// $qr4 = $conn->query('SET character_set_connection=utf8');
// $qr5 = $conn->query('SET character_set_results=utf8');
// $qr6 = $conn->query('SET collation_connection=utf8_general_ci');

$title="Arockia Ilai";
// $_cust_prefix='JJCUST';
// $_fl_prefix='JJFL';
// $_bd_prefix='JJBD';
// $_bq_prefix='JJBQ';
// $_fb_prefix='JJFB';
// $_flkg_prefix='JJKG';
// $_regcl_prefix='JJREB';
// $_regpo_prefix='JJPO';
// $_boubill_prefix='JJBB';
// $_bdbill_prefix='JJBDB';
// $_ssn_fl='JJSF';
// $ssn_placeorder='JJSPO';
// $vendor_prefix='JJVR';
?>