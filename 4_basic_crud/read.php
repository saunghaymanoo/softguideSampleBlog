<?php
require_once "conn.php";
$sql = "SELECT * FROM to_do";
$query=mysqli_query($conn,$sql);
$total_row=mysqli_num_rows($query);
    echo '<ul>';
    while($row=mysqli_fetch_assoc($query)){
        // print_r($row);
        $time=date("g:i",strtotime($row['created_at']));
        echo "<li>[{$row['id']}] [$time] [-{$row['message']}] 
                [<a href='delete.php?id={$row['id']}'>DELETE</a>]
                [<a href='update.php?id={$row['id']}'>UPDATE</a>]
             </li>";
    }

echo '</ul>';
