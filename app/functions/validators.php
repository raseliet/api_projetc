<?php

function validate_login($filtered_input, &$form) {
    $login_success = \App\App::$session->login(
            $filtered_input['email'],
            $filtered_input['password']
    );

    if (!$login_success) {
        $form['fields']['password']['error'] = 'Prisijungimo duomenys neteisingi!';
        $form['fields']['password']['value'] = '';
        return false;
    }

    return true;
}

function validate_mail($field_value, &$field) {
    $modelUser = new \App\Users\Model();
    $users = $modelUser->get(['email' => $field_value]);
    if ($users) {
        $field['error'] = 'Vartotojas tokiu el.paštu jau registruotas!';
        return false;
    }
    
    return true;
}

function validate_is_email($field_value, &$field)
{
    if (!filter_var($field_value, FILTER_VALIDATE_EMAIL)) {
        $field['error'] = 'Neteisingai įvestas el.pašto adresas!';
        return false;
    } else {
        return true;
    }
}

function validate_field_length($field_value, &$field)
{
    if (strlen($field_value) > 40 || $field_value === null) {
        $field['error'] = 'Laukelis viršija 40 simbolių kiekį';
        return false;
    } else {
        return true;
    }
}

//function validate_is_registered($field_value, &$field)
//{
//    if (!\App\App::$user_repository->load(['email' => $field_value])) {
//        $field['error'] = 'User does not exist';
//        return false;
//    } else {
//        return true;
//    }
//}
//
//function validate_email_and_password($filtered_input, &$form, $params)
//{
//    if (!empty($filtered_input['email'])) {
////        $user = (\App\App::$user_repository->load(['email' => $filtered_input['email']]))[0];
//        if (!empty($user)) {
//            if ($user->getPassword() !== $filtered_input['password']) {
//                $form['message'] = 'Wrong password';
//                return false;
//            } else {
//                return true;
//            }
//        }
//    }
//}




