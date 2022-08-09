<?php
require_once "conn.php";
echo "<pre>";
print_r($_FILES);
$fileName=$_FILES['upload']['name'];
$tmpName=$_FILES['upload']['tmp_name'];
$savedir="store/";
foreach($tmpName as $key => $fn){
    $newPhoto=$savedir.uniqid().$fileName[$key];
    move_uploaded_file($fn,$newPhoto);
    $sql="INSERT INTO photos(photo_link) VALUES ('$newPhoto')";
    if(mysqli_query($conn,$sql)){
        header("location:index.php");
    }
}

?>