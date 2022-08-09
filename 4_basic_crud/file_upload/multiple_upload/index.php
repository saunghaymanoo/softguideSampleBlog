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
            $store=scandir('store/');
            foreach($store as $key => $s){
        ?>
                <img class="show-img" src="store/<?php echo $s ?>" alt="">
        <?php } ?>
    </div>
</body>
</html>