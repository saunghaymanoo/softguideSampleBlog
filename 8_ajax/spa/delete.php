<?php
require_once "function.php";

$id = $_GET['id'];

$sql = "DELETE FROM contacts WHERE id=$id";
if(mysqli_query(con(),$sql)){
   echo 'success';
}else{
    die($sql);
}
?>