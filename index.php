<?php

require_once './vendor/autoload.php';

$planets = [
    'test' => 1000,
    'earth' => 40075000,
    'moon' => 10917000,
    'jupiter' => 439263800,
];

$train = new Train($planets['test']);


var_dump($train);

echo <<<EOT

            
        EOT;