<?php
    require_once "conn.php";

    $id=$_GET['id'];
    $sql="DELETE FROM to_do WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        header("location:read.php");

    }else{
        echo "Delete Fail:",mysqli_error();
    }
?>