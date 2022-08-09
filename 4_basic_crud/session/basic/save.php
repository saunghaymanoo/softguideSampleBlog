<?php
session_start();
$_SESSION['name']=$_GET['name'];
$_SESSION['password']=$_GET['password'];

if($_SESSION['name']){
    header('location:data.php');
}