<?php

$materias = [
    "Bases de Datos",
    "Analisis de Datos",
    "Programacion Web",
    "Programacion Orientada a Objetos",
    "Programacion Avanzada"
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creación Listas con PHP</title>
</head>

<body>
    <h1>Materias Inscritas</h1>
    <h2>Santiago Tapia</h2>
    <?php
    foreach ($materias as $materia) {
        echo "<li>$materia</li>";
    }
    ?>
    <ul>
        <li>Programación 1</li>
        <li>Programacion 2</li>
        <li>Programacion 3</li>
        <li>Programacion 4</li>
        <li>Programacion 5</li>
    </ul>

</body>

</html>