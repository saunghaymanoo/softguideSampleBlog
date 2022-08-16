<?php

$data = file_get_contents('http://localhost/php/5_sample_blog/api/post.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        let data = <?php echo $data; ?>;
        console.log(data);
    </script>
</body>
</html>