<?php
session_start(); 
$usuario = $GET["usuarios"];
var_dump(value: $_SESSION);

$_SESSION["usuarios"] = $usuario;
$_SESSION["tareas"] = [
    ["id_tarea" => 1, "descripcion" => "Tarea 1", "completada" => false],
    ["id_tarea" => 2, "descripcion" => "Tarea 2", "completada" => true],
    ["id_tarea" => 3, "descripcion" => "Tarea 3", "completada" => false]
];