<?php
class MySelf{
    public $name = "Su Pon";
    protected $age = 22;
    private $job = "developer";
    function eat(){
        return $this->name." can eat.";
    }
    function sleep(){
        return "I like sleeping";
    }
    public function getJob(){
        return $this->job;
    }
    public function setJob($job){
        $this->job = $job;
    }
}
$obj = new MySelf();
$obj->setJob('programmer');
echo $obj->getJob();
echo $obj->eat();