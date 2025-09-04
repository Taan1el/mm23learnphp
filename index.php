<?php

$array = array(1, 2, 3); // Old syntax
var_dump($array);
$array2 = [1, 2, 3]; // New syntax
var_dump($array2);

$array =[
    1,
    "Taaniel",
   true,
   [1,2,3],
   3.4,
];
var_dump($array);

$array =[
    "name" => "Taaniel",
    "age" => 18,
    "city" => "Tallinn",
    "isMale" => true,
    "isStudent" => true,
];
var_dump($array);

$array =[
    1,
    2,
    "name" => "Taaniel",
    "age" => 18,
    6,
    "city" => "Tallinn",
    "isMale" => true,
    "isStudent" => true,
    3,
    4,
    5,
];
var_dump($array);

$array =[1, 2, 3];
var_dump($array[1]); // 2

$array =[
    "name" => "Taaniel",
    "age" => 18,
    "city" => "Tallinn",
    "isMale" => true,
    "isStudent" => true,
];
var_dump($array["name"]); // Taaniel


$array =[
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];
var_dump($array[1][2]); // 6

$array =[
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];
var_dump($array[2][1]); // 8

$array =[
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9],
];
var_dump($array[0][0]);// 1
var_dump($array[0][1]);// 2
var_dump($array[0][2]);// 3
var_dump($array[1][0]);// 4
var_dump($array[1][1]);// 5

$array = [1, 2, 3];
var_dump($array);
array_push($array, 4);
array_push($array, 5, 6, 7);
$array[] = 8;
var_dump($array);

$array[1] = "something else";
var_dump($array);