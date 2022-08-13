<?php

use MgMg as GlobalMgMg;
use MySelf as GlobalMySelf;

class MySelf{
    public $name = 'Su Pon';
    protected $age = 22;
}
class MgMg extends MySelf{
    public function getProtected(){
        return $this->age;
    }
}
$obj = new MgMg();
echo $obj->name;
echo $obj->getProtected();