<?php 
    require_once "conn.php";
    echo "<pre>";
    $filesName=$_FILES['upload']['name'];
    $tmpName=$_FILES['upload']['tmp_name'];
    $savedir="store/";
    foreach($tmpName as $key => $tf){
        //store dir
        $newDir=$savedir.uniqid().$filesName[$key];
        move_uploaded_file($tf,$newDir);
        //store db
        $sql="INSERT INTO photos(photo_link) VALUES ('$newDir')";
        if(mysqli_query($conn,$sql)){
            header("location:index.php");
        }

    }
?>