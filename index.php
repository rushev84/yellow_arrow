<?php

require_once './vendor/autoload.php';

$equatorLengths = [
    'test' => 200,
    'earth' => 40075000,
    'moon' => 10917000,
    'jupiter' => 439263800,
];

$train = new Train($equatorLengths['test'], 26);
$human = new Human(
    $train,
    1
);

print_r('------initial train---------');
var_dump($train);
$human->go();