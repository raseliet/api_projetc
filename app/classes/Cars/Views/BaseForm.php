<?php

namespace App\Cars\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'manufacturer' => [
                    'label' => 'Gamintojas',
                    'type' => 'select',
                    'options'=> \App\Cars\Car::getManufacturersOptions()
                ],
                'model' => [
                    'label' => 'Modelis',
                    'type' => 'text',
                ],
                'year' => [
                    'label' => 'Metai',
                    'type' => 'number',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Submit',
                ],
            ]
        ];
    }

}
