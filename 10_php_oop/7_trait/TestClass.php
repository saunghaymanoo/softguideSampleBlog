<?php
require_once "Three.php";
class TestClass extends Three {
   use One,Two;

}
$obj = new TestClass();
echo $obj->one;