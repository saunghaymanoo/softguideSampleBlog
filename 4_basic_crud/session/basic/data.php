<?php
session_start();
if($_SESSION['name']){
    echo "hello".$_SESSION['name'];
    echo "<a href='clear.php'>log out</a>";
}else{
    header("location:index.php");
}