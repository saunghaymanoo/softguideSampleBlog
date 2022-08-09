<?php 
    require_once "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .photo{
            width:200px;
            height:200px;
            margin:10px;
        }
    </style>
</head>
<body>
    <form action="save.php" method="post" enctype="multipart/form-data">
        <label for="">Multiple Upload</label>
        <br><br>
        <input type="file" name="upload[]" accept="image/png,image/jpg" multiple><br>
        <button>Upload</button>
    </form>
    <?php
        require_once "conn.php";
        $sql="SELECT * FROM photos";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($query))
        {

        
    ?>
        <img src="<?php echo $row['photo_link'] ?>" alt="" class="photo">
        <a href="delete.php?id=<?php echo $row['id']?>">Delete</a>
    <?php
        }
    ?>
</body>
</html>