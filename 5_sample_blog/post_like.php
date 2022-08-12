<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$userId = $_SESSION['user']['id'];
$postId = $_GET['id'];

// find process
// if else
$sql = "INSERT INTO post_likes (user_id,post_id,status) VALUES ($userId,$postId,'1')";

if (runQuery($sql)) {
    echo countTotal('post_likes',"post_id = ".$postId." AND status='1'");
    // echo 'success';
} else {
    die(mysqli_error(con()));
}
