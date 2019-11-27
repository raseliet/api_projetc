<?php

require '../../../bootloader.php';

$response = new \Core\Api\Response();

$model = new App\Feedbacks\Model();

$conditions = $_POST ?? [];

$feedbacks = $model->get($conditions);
if ($feedbacks !== false) {
    foreach ($feedbacks as $feedback) {
        $response->addData($feedback->getData());
    }
} else {
    $response->addError('Could not pull data from database!');
}

$response->print();