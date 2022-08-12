<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";

$id = $_GET['id'];
// $sql = "SELECT *,COUNT(id) AS countId FROM posts WHERE id=(SELECT ";
$sql = "SELECT posts.*,COUNT(posts.id) AS LikesCount FROM posts INNER JOIN post_likes ON posts.id=post_likes.post_id WHERE post_likes.post_id=$id";
$row = fetch($sql);
echo json_encode($row);