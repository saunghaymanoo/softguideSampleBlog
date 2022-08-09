<?php
function con(){
    return mysqli_connect('localhost','root','','blog');
}
$info=array(
    "name"=>"Sample Blog",
    "short"=>"SB",
    "description"=>"ကျောင်းသားများအတွက် Sample Blog",
);
$role=["Admin","Editor","User"];
$url = "http://{$_SERVER['HTTP_HOST']}/php/5_sample_blog";


?>