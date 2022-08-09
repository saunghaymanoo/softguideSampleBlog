<?php

 unlink("store/".$_GET['name']);
//  header('location:index.php');
echo "<script>location.href='../index.php'</script>";
 ?>