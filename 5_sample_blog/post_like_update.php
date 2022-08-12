<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$userId = $_SESSION['user']['id'];
$postId = $_GET['id'];

$sql = "DELETE FROM post_likes WHERE post_id=$postId AND user_id=$userId";
if(runQuery($sql)){
    echo  countTotal('post_likes',"post_id = ".$postId." AND status='1'");
}
else{
    die($sql);
}