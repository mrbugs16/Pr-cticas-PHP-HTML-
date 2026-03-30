<?php

session_start();
if (!isset($_SESSION["user"]) || trim((string)$_SESSION["user"]) === "") {
    $_SESSION["user"] = "santiago";
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: tareas.php");
    exit();
}

include_once "db_cnx.php";

if(!isset($_POST["id_tarea"]))||
preg_match("/^[0-9]+$/",$_POST["id_tarea"])) {
    $err_msg .="Tarea Invalida";

$descripcion = trim($_POST["descripcion"] ?? "");
$fecha_vencimiento = trim($_POST["fecha_vencimiento"] ?? "");

if ($descripcion === "") {
    echo "Error: La descripción es obligatoria.";
    exit();
}

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

    if($_POST["id_tarea"] > 0{
        $query = "update tareas set
                  descripcion = ?,
                  fecha_vencimiento = ?
                  fecha_finalizada = ?
                  where id_usuario = ?
                  and id_tarea = ?";
    }

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