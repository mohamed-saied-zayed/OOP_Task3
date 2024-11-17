<?php
session_start();
require_once 'Session.php';
require_once 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validator = new Validation();

    // Fetch input values
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $url = $_POST['url'] ;
    $password = $_POST['password'] ;
    $confirmPassword = $_POST['confirmPassword'];

    // Validate inputs
    $validator->required($name, "name");
    $validator->max($name, "name", 20);
    $validator->min($name, "name", 2);

    $validator->required($phone, "phone");
    $validator->phone($phone, "phone");

    $validator->required($email, "email");
    $validator->emailRole1($email, "email");

    if (!empty($url)) { // URL is optional
        $validator->url($url, "url");
    }

    $validator->required($password, "password");
    $validator->matchPattern(
        $password,
        "password",
        "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/"
    );

    $validator->required($confirmPassword, "confirmPassword");
    $validator->matchedInput($confirmPassword, "confirmPassword", $password);

    // Check errors and handle session storage
    $errors = $validator->getErrors();
    if (!empty($errors)) {
        Session::set('errors', $errors);
    } else {
        Session::set('success', $success);
    }
    header("Location: index.php");
    exit();
}

