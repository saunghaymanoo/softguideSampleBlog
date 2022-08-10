<?php
error_reporting(0);
$con = mysqli_connect("localhost","root","","aa");
$dbError = '';
$dbError .= mysqli_connect_error();

error_log($dbError, 3, 'store/error.log');
?>