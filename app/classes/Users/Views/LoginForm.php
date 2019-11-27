<?php

namespace App\Users\Views;

class LoginForm extends \Core\Views\Form {

    public function __construct($data = []) {
        $this->data = [
            'attr' => [
                'id' => 'login-form',
                'method' => 'POST',
            ],
            'fields' => [
                'email' => [
                    'label' => 'El.pašto adresas',
                    'type' => 'email',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty',
                            'validate_is_email'
                        ]
                    ],
                ],
                'password' => [
                    'label' => 'Slaptažodis',
                    'type' => 'password',
                    'extra' => [
                        'validators' => [
                            'validate_not_empty'
                        ]
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Psisijungti',
                ],
            ],
            'validators' => [
                'validate_login'
            ],
            'callbacks' => [
                'success' => 'form_success',
            ],
        ];
    }

}
