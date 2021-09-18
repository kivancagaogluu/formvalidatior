<?php
/**
 * Author: Kıvanç Ağaoğlu
 * Web: https://kivancagaoglu.com
 * Mail: info@kivancagaoglu.com
 * Skype: kivancagaoglu
 *
 */

require_once __DIR__ . '/../vendor/autoload.php';

use bluntk\Validatior;

$validatior = new Validatior();

$_POST['username'] = 'kivanc';
$_POST['password'] = '12345';
$_POST['password_again'] = '12345';
$_POST['email'] = 'mailexample.com';

$rules = [
    'username' => [
        'label' => 'Username',
        'rules' => 'required',
        'errors' => 'Username is required'
    ],
    'password' => [
        'label' => 'Password',
        'rules' => 'required|min_lenght[9]|max_lenght[20]'
    ],
    'password_again' => [
        'label' => 'Password again',
        'rules' => 'required|min_lenght[9]|max_lenght[20]is_equal[password]'
    ],
    'email' => [
        'label' => 'Password again',
        'rules' => 'valid_email'
    ],
];

$validatior->rules = $rules;
$validatior->formData = $_POST;

if($validatior->validate()){

    // Everything is ok. Form values is on data

    $data = $validatior->returnData();

}else{

    $validatior->displayErrors();

    /*
     *
    Password must be at least 9 characters
    Password again must be at least 9 characters
    Password again must be valid email

     * */

}
