<?php
require_once "../core/base.php";
require_once "../core/functions.php";
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin:*");
$sql = "SELECT * FROM posts WHERE 1";
if(isset($_GET['id'])){
    $id = textFilter($_GET['id']) ;
    $sql .= " AND id=$id";
}
$query = mysqli_query(con(),$sql);
$rows = [];
while($row = mysqli_fetch_assoc($query)){
    $arr = [
        "id" => $row['id'],
        "category" => category($row['category_id'])['title'],
        "description" => $row['description'],
    ];
    array_push($rows,$arr);
}
apiOutput($rows);