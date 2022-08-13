<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$userId = $_SESSION['user']['id'];
$post_id = $_POST['id'];


$comment = $_POST['comment'];

$sql = "INSERT INTO comments (user_id,post_id,comment) VALUES ($userId,$post_id,'$comment')";



if (runQuery($sql)) {
    echo 'success';
} else {
    die($sql);
}
