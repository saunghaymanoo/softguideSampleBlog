<?php
require_once "core/base.php";
require_once "core/functions.php";
require_once "core/auth.php";
$currentId = $_GET['id'];

$sql = "DELETE FROM comments WHERE id=$currentId";
if(runQuery($sql)){
    echo 'success';
}