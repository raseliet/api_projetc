<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Cars\Model();

$conditions = $_POST ?? [];

$cars = $model->get($conditions);
if ($cars !== false) {
    foreach ($cars as $car) {
        $response->addData($car->getData());
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();