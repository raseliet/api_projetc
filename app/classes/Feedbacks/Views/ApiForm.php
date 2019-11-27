<?php

namespace App\Feedbacks\Views;

class ApiForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'fields' => [
                'vardas' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'komentaras' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ]
                ],
                'diena' => [
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
//                            'validate_number_range' => [
//                             'min' => 1900,
//                             'max' => 2019
//                         ]
                        ]
                    ]
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ]
        ];
    }

}
