<?php
$name=$_POST['name'];
$password=$_POST['password'];

$dir="store/";
$f=fopen($dir.$name.uniqid().".txt","w");
fwrite($f,$name."\n");
fwrite($f,$password."\n");
fclose($f);
header("location:index.php");