<?php

namespace App\Feedbacks\Views;

class BaseForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'vardas' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                ],
                'komentaras' => [
                    'label' => 'Komentaras',
                    'type' => 'textarea',
                   
                ],
                'diena' => [
                    'label' => 'Data',
                    'type' => 'date',
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Siųsti',
                ],
            ]
        ];
    }

}
