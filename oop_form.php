<?php

require 'functions.php';

spl_autoload_register(function ($className) {
    $fileName = __DIR__ . '/classes/' . $className . '.php';
    require $fileName;
});

$message = '';

try {
    $form = new Form('post');
} catch (InvalidArgumentException $exception) {
    die('Форме передали кривой метод');
} catch (Exception $exception) {
    die('dsfsfds');
}

$form->add(new InputElement('first_name', 'Имя', true));
$form->add(new InputElement('last_name', 'Фамилия', true));
$form->add(new EmailElement('email', 'Email', true));
$form->add(new PasswordElement('password', 'Пароль', true));
$form->add(new ButtonElement('submit', 'Зарегистрировать'));
$form->handleRequest();

if ($form->isSubmitted()) {
    $result = saveUser(
        $form->getValue('first_name'),
        $form->getValue('last_name'),
        $form->getValue('email'),
        $form->getValue('password')
    );

    if ( $result ) {
        $message = 'Пользователь зарегистрирован!';
    }
    else {
        $message = 'Ошибка при регистрации пользователя';
    }
}

require 'oop_form.tpl.php';
