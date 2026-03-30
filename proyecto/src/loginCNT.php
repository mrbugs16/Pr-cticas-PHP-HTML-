<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

$user = trim($_POST["user"] ?? "");
$password = $_POST["password"] ?? "";

if ($user === "" || $password === "") {
    $_SESSION["errmsg"] = "Usuario y contraseña son obligatorios.";
    header("Location: login.php");
    exit;
}

include_once "db_cnx.php";                   
$statement = $cnx->prepare("SELECT  idusuario,
                                    usuario,
                                    password
                            FROM    usuarios
                            WHERE   usuario = ?");

$statement->execute([
    $user,
]);

$row = $statement->fetch(PDO::FETCH_ASSOC); 
if($row == false){
    $_SESSION["errmsg"] = "Las creedenciales no son validas";
    header("Location: login.php");
    exit; 
}

$es_valido = password_verify($password, $row["password"]);

if(!$es_valido){
    $_SESSION["errmsg"] = "Las creedenciales no son validas";
    header("Location: login.php");
    exit; 
}

$_SESSION["user"] = $row["usuario"];
header("Location: tareas.php");
exit; 