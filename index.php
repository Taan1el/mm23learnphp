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
    public function __toString() {
        return "Box: {$this->height} x {$this->width} x {$this->length}";
    }

    public function __destruct() {
        var_dump('box destroyed');
    }

    public function __get($name) {
        var_dump("getting '$name'");
        return "awsome value";
    }

    public function __set($name, $value) {
        var_dump("setting '$name' to '$value'");
        $this->$name = $value;
    }

    public static function __callStatic($name, $args) {
        var_dump("trying to call static function $name with value", $args);
    }
    public function __invoke(...$args) {
        var_dump('invoking object as function');
    }

     public function __call($name, $args) {
        var_dump("calling object method $name with value", $args);
    }
}

class MetalBox extends Box {
    public $material = 'steel';
    public $weightPerUnit = 2;
};

class Cat {
    use Colorful;
    use Smelly;
}

trait Colorful {
    public $color = 'red';
    public function whatColor() {
        return "I am $this->color";
    }
}

function makeBox() {
    $box1 = new Box(1,2,3);
    var_dump($box1->potato);
    $box1->potato = 'yum';
    var_dump($box1->potato);
}

trait Smelly {
    public $smell;
}

$box1 = new Box();

unset($box1);
$box1 = 1;
var_dump('end of box program');