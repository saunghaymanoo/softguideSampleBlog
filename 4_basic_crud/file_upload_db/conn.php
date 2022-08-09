<?php
$conn=mysqli_connect('localhost','root','','my_list');
if(!$conn){
    die("Connection Fail ".mysqli_connect_error());
}