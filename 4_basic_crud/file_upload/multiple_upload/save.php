<?php
echo "<pre>";
print_r($_FILES);
$fileName=$_FILES['upload']['name'];
$tmpName=$_FILES['upload']['tmp_name'];
$savedir="store/";
foreach($tmpName as $key => $fn){
    move_uploaded_file($fn,$savedir.uniqid().$fileName[$key]);
}

?>