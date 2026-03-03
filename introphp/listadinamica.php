<?php

$materias = [
    [
        "materias" => "Base de Datos",
        "semestre ideal" => 5,
        "creditos" => 10
    ],
    [
        "materias" => "Analisis de Datos",
        "semestre ideal" => 5,
        "creditos" => 10
    ],
    [
        "materias" => "Programacion Web",
        "semestre ideal" => 5,
        "creditos" => 10
    ],
    [
        "materias" => "Programacion Orientada a Objetos",
        "semestre ideal" => 5,
        "creditos" => 10
    ],
    [
        "materias" => "Programacion Avanzada",
        "semestre ideal" => 5,
        "creditos" => 10
    ]
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
    foreach ($materias as $key => $materia) { ?>
        <li><?php echo $key . " " . $materia; ?></li>
    <?php } ?>
    <ul>
        <li>Programación 1</li>
        <li>Programacion 2</li>
        <li>Programacion 3</li>
        <li>Programacion 4</li>
        <li>Programacion 5</li>
    </ul>

</body>

</html>