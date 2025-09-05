<?php

function sayHello(){
    var_dump("Hello");
}

sayHello();

function sayHelloToMe($name="Nameless"){
    var_dump("Hello $name");
}

sayHelloToMe("Taaniel");
sayHelloToMe("Tarvin");
sayHelloToMe("Teet");
sayHelloToMe("Tõnu");
sayHelloToMe("Tõnis");
sayHelloToMe();

function sayNameAndAge($name, $age){
    var_dump("Hello $name, you are $age years old");
}

sayNameAndAge("Taaniel", 18);
sayNameAndAge("Tarvin", 22);
sayNameAndAge("Teet", 24);
sayNameAndAge("Tõnu", 26);  
sayNameAndAge("Tõnis", 28);

function recursion($i){
    if($i < 11){
        var_dump($i);
        recursion($i + 1);
    }
}

recursion(1);