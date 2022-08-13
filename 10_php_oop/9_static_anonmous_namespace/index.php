<?php
class ClassOne{
    public static $x = "this is static property";
    public static function aa(){
        return "this is aa  ".self::$x;
    }
}
class Main{
    public function Inner(){
        return new class extends Main{
            public $x = "this is inner<br>";
            public function Inner2(){
                return new class extends Main{
                    public $y="this is inner2<br>";
                };
            }
        };
    }
}
$obj = new Main;
echo $obj->Inner()->x;
echo ClassOne::$x."<br>";
echo ClassOne::aa();