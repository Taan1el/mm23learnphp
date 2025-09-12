<?php

class Box {
    public $height = 0;
    private $width = 0;
    protected $length = 0;

    public static $count = 0;

    public function __construct($height=0, $width=0, $length=0) {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public static function cool(){
        var_dump(self::$count);
    }

    public function setWidth($width){
        if(is_numeric($width) && $width > 0){
            $this->width = $width;
        } else {
            throw new Exception('width needs to be number and bigger than 0');
        }
    }

    public function volume() {
        return $this->height * $this->width * $this->length;
    }
}

class MetalBox extends Box {
    public $material = 'steel';
    public $weightPerUnit = 2;
    public function weight() {
        return $this->volume() * $this->weightPerUnit;
    }
};

$metalBox = new MetalBox(10, 10, 10);
var_dump($metalBox);
var_dump($metalBox->volume());
var_dump($metalBox->weight());

$box1 = new Box(10, 10, 10);
$box1::$count = 1;
var_dump($box1::$count);

$box2 = new Box(10, 10, 10);
$box2::$count = 1;
var_dump($box2::$count);

var_dump($Box1::$count);
Box::cool();


