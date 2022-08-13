<?php
require_once "../core/base.php";
require_once "../core/functions.php";
header("Content-Type: application/json; charset=UTF-8");
$sql = "SELECT * FROM posts";
apiOutput($sql);