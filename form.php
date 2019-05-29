<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Форма</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
<h1>Получено:</h1>
<table>
<?php foreach ($_REQUEST as $field => $value): ?>
	<tr>
		<th><?= $field ?></th>
		<td><?= htmlentities($value) ?></td>
	</tr>
<?php endforeach ?>
</table>

