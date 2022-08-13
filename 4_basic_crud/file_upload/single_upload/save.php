<?php
echo "<pre>";
$fileTypeArr = ['image/png', 'image/jpeg'];
$fileName = $_FILES['upload']['name'];
$tmpName = $_FILES['upload']['tmp_name'];
if ($fileName) {
    if (in_array($_FILES['upload']['type'], $fileTypeArr)) {
        $savedir = "store/";
        if (move_uploaded_file($tmpName, $savedir . $fileName)) {
            header("location:index.php");
        }
    }else{
        echo "invalid file type";
    }
} else {
    echo "Empty file";
}
