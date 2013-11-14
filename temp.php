<?php

$matriz = array("uno" => 1);
$matriz = array("dos" => 2);
$matriz = array("uno" => 3,"dos"=>2);
$temp = array("tres" => 3);
array_push($matriz, $temp);
var_dump($matriz);

