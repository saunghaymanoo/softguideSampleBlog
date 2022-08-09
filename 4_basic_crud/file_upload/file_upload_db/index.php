<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .show{

        }
        .show-img{
            margin:20px;
            height:100px;
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
    <div class="show">
        <?php
            require_once "conn.php";
            $sql="SELECT * FROM photos";
            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($query)){
        ?>
                <img class="show-img" src="<?php echo $row['photo_link'] ?>" alt="">
                <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
        <?php } ?>
    </div>
</body>
</html>