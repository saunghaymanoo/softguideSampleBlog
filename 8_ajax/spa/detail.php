<?php
    require_once "function.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM contacts WHERE id=$id";
    $query = mysqli_query(con(),$sql);
    if($row = mysqli_fetch_assoc($query)){
        echo json_encode($row);
    }
    
?>
