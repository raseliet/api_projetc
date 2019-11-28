<?php

namespace App\Users\Views;

class RegisterForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'register-form',
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'Vardas',
                    'type' => 'text',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_alphabet_only',
                            'validate_field_length'
                        ]
                    ],
                ],
                'surname' => [
                    'label' => 'Pavardė',
                    'type' => 'text',
//                   'optional' => true,
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_alphabet_only',
                            'validate_field_length'
                        ]
                    ],
                ],
                'email' => [
                    'label' => 'El.pašto adresas',
                    'type' => 'email',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_email',
                            'validate_mail',
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                        ]
                    ],
                ],
                'password_repeat' => [
                    'label' => 'Pakartokite slaptažodį',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
                'phone' => [
                    'label' => 'Telefono numeris',
                    'type' => 'number',
                    'optional' => true,
                    'extra' => [
                        'validators' => [
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Registruotis',
                ],
            ],
            'validators' => [
                'validate_fields_match' => [
                    'password',
                    'password_repeat',
//                    'validate_is_registered'
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
