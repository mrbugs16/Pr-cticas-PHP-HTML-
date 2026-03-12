<?php

session_start();
if(!isset( $_SESSION["usuario"])){
    header("Location:login.php");
    exit();

}

echo "<pre>";
var_dump($_SESSION[""]);
echo"";

//hacer validacion, para el archivo TareasCNT.php
// hacer una tabla con las tareas
//insertar a la base de datos con el query y lo ejecutamos con el trycatch