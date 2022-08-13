<?php
class Index{
    public function run(){
        echo "this is run method";
    }
    public function __construct(){
        echo "this is construction";
    }
    public function __destruct()
    {
        echo "this is destruction";
    }
   
}
$obj = new Index();
$obj->run();