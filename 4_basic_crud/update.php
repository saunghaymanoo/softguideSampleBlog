<?php require_once "conn.php";
$id = $_GET['id'];
$sql="SELECT * FROM to_do WHERE id=$id";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($query);

if(isset($_GET['updateBtn'])){
    $message=$_GET['message'];
    $sql = "UPDATE to_do SET message= '$message' WHERE id=$id";
    echo $sql;
    if(mysqli_query($conn,$sql)){
        echo "update success";
        header('location:read.php');
    }else{
        echo "Update Fail:",mysqli_error();
    }
}


?>
<form action="">
    <input type="hidden" value="<?php echo $id ?>" name='id'>
    <input type="text" value="<?php echo $row['message'] ?>" name='message'>
    <button name="updateBtn">Update</button>
</form>