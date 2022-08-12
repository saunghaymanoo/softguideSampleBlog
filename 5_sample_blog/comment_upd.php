<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$userId = $_SESSION['user']['id'];
$comment = $_POST['comment'];
$post_id = $_POST['id'];
$commentId = $_POST['commentId'];

$sql = "UPDATE comments SET comment='$comment' WHERE id=$commentId";
if(runQuery($sql)){
    echo 'success';
}else{
    die($sql);
}