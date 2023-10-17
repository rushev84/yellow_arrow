<?php

require_once './vendor/autoload.php';

echo "Введите количество вагонов поезда (не более 10000): ";
$carsNumber = fgets(STDIN);

echo "Введите время, необходимое на проход по одному вагону (в секундах): ";
$timeForOneCar = fgets(STDIN);

$app = new App($carsNumber, $timeForOneCar);
$app->start();