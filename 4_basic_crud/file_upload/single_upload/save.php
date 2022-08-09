<?php
echo "<pre>";
print_r($_FILES);
$fileName=$_FILES['upload']['name'];
$tmpName=$_FILES['upload']['tmp_name'];
$savedir="store/";
if(move_uploaded_file($tmpName,$savedir.$fileName)){
    header("location:index.php");
}
?>