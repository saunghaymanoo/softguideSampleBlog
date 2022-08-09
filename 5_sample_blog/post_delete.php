<?php

require_once "core/auth.php";
require_once "core/base.php";
require_once "core/functions.php";

$id = $_GET['id'];

if(postDelete($id)){
    linkto('post_list.php');
}