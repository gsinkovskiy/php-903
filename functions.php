<?php

function saveUser(string $firstName, string $lastName, string $email, string $password): bool
{
    $pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
    $query = $pdo->prepare('
        INSERT INTO users (first_name, last_name, email, password)
        VALUES (:first_name, :last_name, :email, :password) 
    ');
    $query->bindValue('first_name', $firstName);
    $query->bindValue('last_name', $lastName);
    $query->bindValue('email', $email);
    $query->bindValue('password', $password);
    $query->execute();

    return true;
}
