<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root', [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]
);

$query = $pdo->query('SELECT first_name, last_name, email FROM users ORDER by first_name');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <style>
        td {border: 1px solid black; padding 5px 2px}
    </style>
</head>
<body>
<table>
    <tr>
        <th>Имя</th>
        <th>Фамилия</th>
        <th>Email</th>
    </tr>

    <?php while ($row = $query->fetch()): ?>
        <tr>
            <td><?=$row['first_name']?></td>
            <td><?=$row['last_name']?></td>
            <td><?=$row['email']?></td>
        </tr>
    <?php endwhile ?>
</table>
</body>
</html>
