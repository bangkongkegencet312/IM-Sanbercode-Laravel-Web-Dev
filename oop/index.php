<?php

require_once "Animal.php";
require_once "Frog.php";
require_once "Ape.php";

$sheep = new Animal("shaun");

echo "Name : " . $sheep->get_name . "<br>";
echo "Legs : " . $sheep->get_legs . "<br>";
echo "cold blooded : " . $sheep->get_cold_blooded . "<br><br>";


$kodok = new Frog("buduk");

echo "Name : " . $kodok->get_name . "<br>";
echo "Legs : " . $kodok->get_legs . "<br>";
echo "cold blooded : " . $kodok->get_cold_blooded . "<br>";
$kodok->jump();
echo "<br>";


$sungokong = new Ape("kera sakti");

echo "get_name : " . $sungokong->get_name . "<br>";
echo "get_legs : " . $sungokong->get_legs . "<br>";
echo "cold blooded : " . $sungokong->get_cold_blooded . "<br>";
$sungokong->yell();

?>