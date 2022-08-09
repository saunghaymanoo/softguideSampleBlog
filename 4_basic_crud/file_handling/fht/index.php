<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="write.php" method="post">
        <label for="">Name:</label>
        <input type="text" name="name">
        <br>
        <label for="">Password:</label>
        <input type="text" name="password">
        <br>
        <button >Click</button>
    </form>
    <?php
        $list=scandir("store");
        echo "<ul>";
        foreach($list as $key => $l){
            if($l =="." || $l ==".."){
                continue;
            }

            ?>
            <li>
                <a href="store/<?php echo $l ?>" target="_blank"><?php echo $l ?></a>
                <a href="del.php/?name=<?php echo $l ?>" target="_blank">Delete</a>
            </li>
    <?php
        }
        echo "</ul>";
    ?>
</body>
</html>