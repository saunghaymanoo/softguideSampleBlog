<?php
require_once "conn.php";
// echo $_GET['id'];
$id=$_GET['id'];
$sql="SELECT * FROM photos WHERE id=$id";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);
if($row){
    unlink($row['message']);
}
$sql="DELETE FROM photos WHERE id=$id";
if(mysqli_query($conn,$sql)){
    header("location:index.php");
}

