<?php
require_once "conn.php";
echo "<pre>";

if(isset($_GET['addBtn'])){
//print_r($_GET);
$message=$_GET['message'];
$query="INSERT INTO to_do(message) VALUES ('$message')";
//die($query);
if(mysqli_query($conn,$query)){
    echo "Aung P";
    header("location:create.php");
}else{
    echo "Query Fail".mysqli_error();
}
}
echo "</pre>";
?>
<form action="" method="get">
    <input type="text" name="message" required/>
    <button name="addBtn">Add</button>
</form>