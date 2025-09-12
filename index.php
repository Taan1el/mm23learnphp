<?php

class Box {
    public $height;
    public $width;
    public $length;

    public function __construct($height, $width, $length) {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

public function setHeight($height){
    if(is_numeric($height) && $height > 0){
        $this->height = $height;
    } else {
        throw new Exception("Height must be a positive number.");
    }
}

    public function volume(){
        return $this->height * $this->width * $this->length;
    }
}

$box1 = new Box(10, 20, 30);
$box1->setWidth(15);
$volume1 = $box1->volume();
var_dump($box1);
var_dump($volume1);
var_dump($box1->volume());

$box2 = new Box(40, 50, 60);
var_dump($box2);
var_dump($box2->volume());