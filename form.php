<?php

$result = '';
$operand1 = '';
$operator = '';
$operand2 = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parameters = ['operand1', 'operator', 'operand2'];

    foreach ( $parameters as $parameter ) {
        if ( empty($_POST[$parameter]) ) {
            die('Не найден элемент ' . $parameter);
        }
    }

    $operand1 = floatval($_POST['operand1']);
    $operand2 = floatval($_POST['operand2']);
    $operator = $_POST['operator'];

    switch ( $operator ) {
        case '+':
            $result = $operand1 + $operand2;
            break;
        case '-':
            $result = $operand1 - $operand2;
            break;
        case '*':
            $result = $operand1 * $operand2;
            break;
        case '/':
            $result = $operand1 / $operand2;
            break;
        default:
            die('Неверный оператор: ' . $operator);
    }

    //echo $operand1 . ' ' . $operator . ' ' . $operand2 . ' = ' . $result;
}

include 'form.tpl.php';
