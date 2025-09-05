<?php

$num = 5;
if ($num > 5) {
    var_dump ("Bigger than 5");
}  elseif ($num === 5) {
    var_dump ("Equal to 5");
} else {
    var_dump ("Smaller than 5");
} 

$day = date("N", strtotime("04.09.2025"));
var_dump($day);
if ($day == 1) {
    var_dump("Esmaspäev");

} elseif ($day == 2) {
    var_dump("Teisipäev");

} elseif ($day == 3) {
    var_dump("Kolmapäev");

} elseif ($day == 4) {
    var_dump("Neljapäev");

} elseif ($day == 5) {
    var_dump("Reede");

} elseif ($day == 6) {
    var_dump("Laupäev");

} elseif ($day == 7) {
    var_dump("Pühapäev");

} else {
    var_dump("PUHKEpäev");
}

switch ($day) {
    case 1:
        var_dump("Esmaspäev");
        break;
    case 2:
        var_dump("Teisipäev");
        break;
    case 3:
        var_dump("Kolmapäev");
        break;
    case 4:
        var_dump("Neljapäev");
        break;
    case 5:
        var_dump("Reede");
        break;
    case 6:
        var_dump("Laupäev");
        break;
    case 7:
        var_dump("Pühapäev");
        break;
    default:
        var_dump("puhkepäev");
        break;
}