<?php

use \App\App;

require '../../../bootloader.php';

// Check user authorization
if (!App::$session->userLoggedIn()) {
    $response = new \Core\Api\Response();
    $response->addError('You are not authorized!');
    $response->print();
}

// Filter received data
$form = (new \App\Feedbacks\Views\ApiForm())->getData();
$filtered_input = get_form_input($form);
validate_form($filtered_input, $form);

/**
 * If request passes validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_success($filtered_input, &$form) {
    $response = new \Core\Api\Response();
    $model = new \App\Feedbacks\Model();

    $conditions = [
        'row_id' => intval($_POST['id'])
    ];

    //gauname areju su $cars objektais (siuo atveju viena objekta arejuje pagal paduota id
    $feedbacks = $model->get($conditions);
    if (!$feedbacks) {
        $response->addError('Car doesn`t exist!');
    } else {
        $feedback = $feedbacks[0];

        //idedame i data holderi naujas vertes, kurias ivede useris 
        //ir kurios atejo is javascripto
        $feedback->setVardas($filtered_input['vardas']);
        $feedback->setKomentaras($filtered_input['komentaras']);
        $feedback->setDiena($filtered_input['diena']);
        
        //vertes, kurias idejome auksciau i data holderi updatinam 
        //ir duombazeje FileDB ka daro $drinksModel->update($drink) metodas
        $model->update($feedback);
        
        // Irasom visa dalyvio informacija i response
        $response->setData($feedback->getData());
    }
    
    $response->print();
}

/**
 * If request fails validation
 * this function is automatically
 * called
 * 
 * @param type $filtered_input
 * @param type $form
 */
function form_fail($filtered_input, &$form) {
    $response = new \Core\Api\Response();

    foreach ($form['fields'] as $field_id => $field) {
        if (isset($field['error'])) {
            $response->addError($field['error'], $field_id);
        }
    }

    $response->print();
}