<?php

$bool = true && false; //false
var_dump($bool);

$bool = true || false; //true
var_dump($bool);

$bool = !true; //false
var_dump($bool);

$bool = 10 > 5; //true
var_dump($bool);

$bool = 10 < 5; //false
var_dump($bool);

$bool = 10 < 10; //false
var_dump($bool);

$bool = 10 > 10; //false
var_dump($bool);

$bool = 10 >= 10; //true
var_dump($bool);

$bool = 10 <= 10; //true
var_dump($bool);

$bool = 10 == 10; //true
var_dump($bool);

$bool = 10 == "10"; //true
var_dump($bool);

$bool = 10 === "10"; //false
var_dump($bool);

$bool = 10 != 10; //false
var_dump($bool);

$bool = 10 !== 10; //true
var_dump($bool);

$bool = (true && false || true && !false) && true; //true
var_dump($bool);

