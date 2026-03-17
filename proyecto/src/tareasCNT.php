<?php

session_start();
// Bypass temporal de login para poder probar inserción desde localhost
if (!isset($_SESSION["user"]) || trim((string)$_SESSION["user"]) === "") {
    $_SESSION["user"] = "santiago";
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: tareas.php");
    exit();
}

include_once "db_cnx.php";

$descripcion = trim($_POST["descripcion"] ?? "");
$fecha_vencimiento = trim($_POST["fecha_vencimiento"] ?? "");

if ($descripcion === "") {
    echo "Error: La descripción es obligatoria.";
    exit();
}

// Validar fecha_vencimiento si viene (input type=date)
$fechaVencSql = null;
if ($fecha_vencimiento !== "") {
    $dt = DateTime::createFromFormat("Y-m-d", $fecha_vencimiento);
    if (!$dt || $dt->format("Y-m-d") !== $fecha_vencimiento) {
        echo "Error: La fecha de vencimiento no es válida.";
        exit();
    }
    $fechaVencSql = $dt->format("Y-m-d 00:00:00");
}

try {
    // Buscar id_usuario a partir del usuario en sesión
    $stmtUser = $cnx->prepare("SELECT id_usuario FROM usuarios WHERE usuario = ?");
    $stmtUser->execute([$_SESSION["user"]]);
    $rowUser = $stmtUser->fetch(PDO::FETCH_ASSOC);

    if ($rowUser === false) {
        echo "Error: No se encontró el usuario en la base de datos.";
        exit();
    }

    $stmt = $cnx->prepare(
        "INSERT INTO tareas (id_usuario, descripcion, fecha_vencimiento)
         VALUES (?, ?, ?)"
    );
    $stmt->execute([
        $rowUser["id_usuario"],
        $descripcion,
        $fechaVencSql
    ]);

    header("Location: tareas.php");
    exit();
} catch (Exception $e) {
    echo "Error al guardar la tarea: " . $e->getMessage();
    exit();
}