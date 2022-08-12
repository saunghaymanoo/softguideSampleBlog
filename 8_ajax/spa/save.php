<?php
require_once "function.php";
$name = $_POST['contact-name'];
$phone = $_POST['phone'];
$sql = "INSERT INTO contacts (name,phone) VALUES ('$name','$phone')";
if(mysqli_query(con(),$sql)){
    echo 'success';
}